import React, { memo } from 'react';

export const TextareaHandle = memo(() => {
  CKEDITOR.replace('description');
  return null;
});
