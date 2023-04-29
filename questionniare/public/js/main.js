const multiChoice = document.getElementById('multiChoice');
const open = document.getElementById('open');
const questions = document.getElementById('questions');
const fieldset = document.getElementById('fieldset');
const choice = document.getElementById('choice');
const submit = document.getElementById('questionSubmit');



open.addEventListener('click', function() {
  template = '';
  template += `
    <label>Question Title:</label>
    <input type="text" name="question">
    <input type="hidden" name="type" value="open">
  `;
  multiChoice.classList.add('hidden');
  open.classList.add('hidden');
  submit.classList.remove('hidden');

  questions.innerHTML += template;
});

multiChoice.addEventListener('click', function() {
    template = '';
    template += `
      <label>Question:</label>
      <input type="text" name="question">
      <legend>Choices </legend>
      <input type="hidden" name="type" value="multiChoice">

    `;
    multiChoice.classList.add('hidden');
    open.classList.add('hidden');
    choice.classList.remove('hidden');
    submit.classList.remove('hidden');
    fieldset.innerHTML += template;
  });

choice.addEventListener('click', function(){
    let i = 0;
    i++
    template = '';
    template += `

    <label>Choice:</label>
    <input name="choices[][choice]"type="text">
    `;
    fieldset.innerHTML += template;
})