<!DOCTYPE html>
<html>

<head>

  <style>

.stl{
  position: relative;
  text-align: center;
  margin-top: 10%;
  font-size: 40px;
  text-shadow: 1px 1px lightgreen;
   animation-name: rk;
  animation-duration:20s ; 
 
  }
     @keyframes rk{
       0%   {
            color: red;
            border-radius: 10%;}
  10%  {
       color: red;
       border-radius: 40%;}
  20%  {
       color: black;
       border-radius: 30%;}
  30% {
      color: orange;
      border-radius: 80%;}
        40% {
            color: yellowgreen;
            border-radius: 30%;}
        50% {
            color: pink;
            border-radius: 60%;}
        60% {
            color: green;
            border-radius: 25%;}
        70% {
            color: skyblue;
            border-radius: 40%;}
        90% {
            color: pink;
            border-radius: 30%;
            }
        100% {
             color: blanchedalmond;
             border-radius: 10%;}
        }
      
    
   

  .stl:hover{
       color: red;
    
    }
.stl-bg{
    opacity: 0.93;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  
}
.button{
   width: 200px;
   margin: 10px;
  font-weight: bold;
  border: 2px solid blue;
   font-size: 45px;
  margin-top: 10%;
  color: #fff;
  border-radius: 10px;
  background: transparent;
  cursor: pointer;
  position: relative;
}

    span{
      background: red;
      height: 100%;
      width: 0;
      position: absolute;
      left: 0;
      bottom: 0;
      z-index: -1;
      transition: 0.5s;
    }
    .button:hover span{
      width: 100%;
      
      
    }
    .button:hover{
     border: 2px solid rgb(8, 12, 12);
     box-shadow: 4px 2px 2px 5px#070708;
      
    }
  .div{
    margin-top: 10%;
    width: 50vw;
    display: flex;
    flex-direction: column;
  }
  h1{
    font-size: 40px;
    text-shadow: 1px 2px green;
    color: rgb(0, 0, 0);
    font-weight: 900;
  }
  </style>
</head>

<body  class="bd">
    <img
    class="stl-bg"
    src="img.png"
    >
  
  <div class="div" >
      <div>
         <h1 class="stl" ><b>Login /Register Here</b></h1>
        </div>
        <div style="text-align: center;">
      <a href="Validation/register.html">
        <button class="button"><span></span>Register</button>
    </a>
    <a href="Validation/login.html">
        <button class="button"><span></span>Login</button>
    </a>
        </div>
  </div>
  
</body>

</html>