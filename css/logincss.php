<style>
        * {
    margin: 0; padding: 0;
}
html, body, #container {
    height: 100%;
}
header {
    height: 11%;
}
label{
        text-align: left;
        color:black;
       }
       h3{
        text-align: center;
        color:black;
        font-family:Serif;
        text-align:center;
        font-size:35px
       }
       p{
        text-align: center;
        color:black;
        font-family:Serif;
        font-size:20px
       }
       body {
  background-image: url('./img/LB1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
.content {
  background-color: whitesmoke;
    max-width: 35%;
    margin-left: 20%;
    padding: 10px;
    border: 5px solid black;
  }
  .divider-text{
  position: relative;
  text-align: center;
  margin-top: 15px;
  margin-bottom: 15px;
  padding : 5px;
  
}
.divider-text span{
  padding: 7px;
  font-size: 12px;
  position: relative;
  z-index: 2;
}
.divider-text::after{
  content: "";
  position: absolute;
  width: 100%;
  border-bottom: 5px solid black;
  top: 55%;
  left: 0;
  z-index: 1;
}
@media (max-width: 787px) {
    .content {
        max-width: 90%; /* Adjust the maximum width for smaller screens */
        margin-left: 5%; /* Adjust the margin for smaller screens */
    }

    /* Adjust other styles for smaller screens as needed */
}
    </style>