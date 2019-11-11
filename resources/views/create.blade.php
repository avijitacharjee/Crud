@extends('layouts.app')
@section('content')
<style>
    #form {
        padding: 70px;
        background: rgba(135, 206, 235,1);
    }
    
</style>
<form id="form" action="" method="POST" onSubmit="return valid()">
{{csrf_field()}}
<div class="form-group">
    <label for="name">Name</label>
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
        </div>
        <div class="col" id="nameVM">
            
        </div>
    </div>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <div class="row">
        <div class="col">
            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
        </div>
        <div class="col" id="emailVM">
            
        </div>
    </div>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <div class="row">
        <div class="col">
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        </div>
        <div class="col" id="passwordVM">
            
        </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary" onClick="validate()">Submit</button>
</form>
<p id='t'></p>
<script>
    function abc()
    {
        console.log(document.getElementById("name").value);
    }
    function valid()
    {
        var nameObj = document.getElementById("name");
        var emailObj= document.getElementById("email");
        var passwordObj=document.getElementById("password");
        var flag=true;
        if(nameObj.value=="")
        {

            flag=false;
        }
        if(emailObj.value=="")
        {
            return false;
        }
        if(passwordObj.value=="")
        {
            return false;
        }
    }
    function validateName()
    {
        var nameObj= document.getElementById('name');
        nameObj.oninput=console.log(nameObj.value);
    }
    function fetc()
    {
        fetch('127.0.0.1:8000/getEmails',{
            headers: {
            "Content-Type": "application/json",
        },
        method: "GET"
        })
            .then(response => {
                response.json();
            })
            .then(data => {
                console.log(data);
            })
            .catch(err => {
                console.log(err);
        });
        console.log('hi');
    }
    function validate()
    {
        var nameObj = document.getElementById("name");
        var emailObj= document.getElementById("email");
        var passwordObj=document.getElementById("password");
    }
    function A()
    {
        var request = new XMLHttpRequest();

        request.open('GET', 'http://127.0.0.1:8000/getEmails', true);
        request.onload = function() {
        // Begin accessing JSON data here
            var data = JSON.parse(this.response)

            if (request.status >= 200 && request.status < 400) {
                console.log(data);
            }
            else {
                console.log('error')
            }
        }
        request.send();
    }
    function realTimeValidation()
    {
        var nameObj = document.getElementById("name");
        var emailObj= document.getElementById("email");
        var passwordObj=document.getElementById("password");
        nameObj.oninput=function()
        {
            emailObj.value=nameObj.value;
        };



    }
    (function()
    {
        var a = document.getElementById("name");
        a.oninput = function() {
          document.getElementById("t").innerHTML = a.value;
        };
        A();
        fetc();
        validateName();
        
    })();
</script>
@endsection()