function goUserPage(){
  var x = confirm("Kayıt bilgileriniz doğru mu?");
  if (x == true){
      location = "userPage.html";
  } else {
      location = "signin.html";
  }
}
