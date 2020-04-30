var btn1=document.getElementById("btn1");
var btn2=document.getElementById("btn2");
btn2.addEventListener('click',function(){
  document.getElementById("OwnerForm").style.display="table-cell";
    document.getElementById('CompanyForm').style.display="none";
    
});
btn1.addEventListener('click',function(){
    document.getElementById("OwnerForm").style.display="none";
    document.getElementById('CompanyForm').style.display="table-cell";
});


