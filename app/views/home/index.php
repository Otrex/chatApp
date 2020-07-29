
<h1 style = "text-align:center;"> Login - Index </h1>

<div id="result">

</div>
<script>

let result = document.querySelector("#result");

fetch('chats/getAllChats')

  .then(response => response.json())

  .then(data => result.innerHTML = trance(data));

function trance(s) {
    console.log(s);
   return JSON.stringify(s);
}

const formData = new FormData();
formData.append("name", "obi");

fetch('${cors}https://chatroomxx.000webhostapp.com/chats/getAllChats', {
  method: 'POST',
  body: formData,
})
.then(response => response.text())
.then(result => {
  console.log('Success:', result);
})
.catch(error => {
  console.error('Error:', error);
});

</script>