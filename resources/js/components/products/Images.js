import React, { Component } from 'react';


export default class Images extends Component{

  constructor(){
    super();

    this.state = {
      token: $('meta[name="csrf-token"]').attr('content'),
      dropzone: null,
    };
  }

  async componentDidMount(){

    Dropzone.autoDiscover = false;
    $('#save-button').on('click', this.handleSubmit.bind(this));

    await this.setState({
      dropzone: new Dropzone(document.getElementById('dropzone'), {
                  maxFilesize: 8,
                  autoProcessQueue: false,
                  addRemoveLinks: true,
                  parallelUploads: 12,
                  headers: {
                    'X-CSRF-TOKEN': this.state.token,
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
                }),
    });

    if(this.props.preload)
      this.preload();
  }

  preload(){
    const files = $('.image-filename');
    for(var i=0; i<files.length; i++)
    {
        var file = {
          name: files[i].value,
          size: 12345,
        };
        this.state.dropzone.emit('addedfile', file);
        this.state.dropzone.emit('thumbnail', file, 'http://127.0.0.1:8000/images/' + file.name);
        console.log(file.name);
    }
  }

  handleSubmit(e) {
    e.preventDefault();
    if(this.state.dropzone.files.length === 0)
      $('#main-form').submit();
    else {
      this.state.dropzone.processQueue();
    }
  }

  componentWillUnmount(){
    $('#main-form').off('click');
  }

  render() {
    return (
      <React.Fragment>
        <label for="dropzone">Images</label>
        <form action="/products/images/upload" method="POST" encType="multipart/form-data" className="dropzone mt-2" id="dropzone" files="true"></form>
      </React.Fragment>
    );
  }
}
