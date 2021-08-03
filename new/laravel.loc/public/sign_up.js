signUp();
async function signUp(){
    $('#sign_up_form').submit(function(e){
        e.preventDefault();
        const name = $('#inputName').val();
        const email = $('#inputEmail').val();
        const password = $('#inputPassword').val();
        let data = new FormData();
        data.append('name', name);
        data.append('email', email);
        data.append('password', password);
    });
    let res = await fetch('/sign-up',{
        method:'post',
        body:data
    });
    res = await res.json();
    console.log(res);
}
