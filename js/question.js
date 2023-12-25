const btn = document.getElementById('button').value

const xhr = new XMLHttpRequest()
if (xhr.status == 200){
    xhr.open('GET', '../model/questionModel.php', true)
    xhr.open('POST', '../model/questionModel.php', btn);
}

$.ajax({
    method: 'GET',
    url : "../model/questionModel.php",
    success: (response) => {
        console.log(response)
    },
    error: (error) => {
        console.log(error)
    }
});

$.ajax({
    url : "../model/questionModel.php",
    content : document.getElementById('timer')

}).done(function (){
    $(this).addClass("done")
})
