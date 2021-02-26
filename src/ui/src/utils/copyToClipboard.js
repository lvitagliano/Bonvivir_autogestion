const copyToClipboard = text => {
  let element = document.createElement('textarea');

  element.id = 'aux';
  element.innerText = text;
  document.body.appendChild(element);

  element = document.getElementById('aux');
  element.select();
  document.execCommand('copy');

  document.body.removeChild(element);
};

export default copyToClipboard;
