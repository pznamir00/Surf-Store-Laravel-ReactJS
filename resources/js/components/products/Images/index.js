import React, { Component } from 'react'
import Form from './Form'
import { connect } from 'react-redux'
import actions from '../../../redux/imagesUpload/actions'



export default class Images extends Component{

  constructor (props) {
    super(props);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  async componentDidMount () {
    Dropzone.autoDiscover = false;
    this.props.initDZ(await new Dropzone(document.getElementById('dropzone'), {
        maxFilesize: 8,
        autoProcessQueue: false,
        addRemoveLinks: true,
        parallelUploads: 12,
        headers: {
          'X-CSRF-TOKEN': this.props.token,
        },
        init: function() {
          this.on('complete', function(){
            if(this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0){
              setTimeout(function(){
                $('#main-form').submit();
              }, 2000);
            }
          });
          this.on('removedfile', function(file){
            var newInput = document.createElement('input');
            newInput.type = "hidden";
            newInput.value = file.name;
            newInput.name = "removed[]";
            if($('#removed-images'))
              $('#removed-images').append(newInput);
          });
        }
      }));

      //preload for EditProduct component
      if(this.props.preload)
        this.props.preload(this.props.dropzone);

      document.getElementById('save-button').addEventListener('click', this.handleSubmit);
    }

  handleSubmit(e) {
    e.preventDefault();
    if(this.props.dropzone.files.length === 0)
      $('#main-form').submit();
    else {
      this.props.dropzone.processQueue();
    }
  }

  componentWillUnmount(){
    $('#main-form').off('click');
  }

  render() {
    return <Form/>
  }
}



const mapStateToProps = (state) => {
  return {
    token: state.imagesUpload.token,
    dropzone: state.imagesUpload.dropzone
  }
}

const mapDispatchToProps = (dispatch) => ({
    initDZ: dropzone => dispatch(actions.initDZ(dropzone))
})

export const ImagesContainer = connect(mapStateToProps, mapDispatchToProps)(Images);
