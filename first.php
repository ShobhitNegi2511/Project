<!DOCTYPE html>
<html>
<head>
<style>
body {
  background-image: url("b.jpg");
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin: 0;
  padding: 0;
  background-color: #f5f6f9;
}

a {
  text-decoration: none;
  color: white;
}

h1 {
  font-family: "Montserrat Medium";
  max-width: 40ch;
  text-align: center;
  transform: scale(0.94);
  animation: scale 3s forwards cubic-bezier(0.5, 1, 0.89, 1);
  font-size: 50px;
  margin: 0;
}

@keyframes scale {
  100% {
    transform: scale(1);
  }
}

span {
  display: inline-block;
  opacity: 0;
  filter: blur(4px);
  color: #90AFC5;
  animation: fade-in 0.8s forwards cubic-bezier(0.11, 0, 0.5, 0);
}

span:nth-child(1) {
  animation-delay: 0.1s;
}

span:nth-child(2) {
  animation-delay: 0.2s;
}

span:nth-child(3) {
  animation-delay: 0.3s;
}

@keyframes fade-in {
  100% {
    opacity: 1;
    filter: blur(0);
  }
}

.logo-container {
  position: relative;
  margin-bottom: 20px; /* Added margin to separate the two h1 elements */
}

.logo-container:before {
  content: "";
  position: absolute;
  top: calc(100% - 2px);
  width: 100%;
  height: 4px;
  background-color: #cf0000;
  transform-origin: center center;
  transform: scaleX(0);
  animation: line-animation 3s;
}

h1#page-logo {
  font: bold 6rem 'Arial', sans-serif;
  color: #002C54;
  animation: clip-path-reveal-1 3s;
}

@keyframes line-animation {
  0% { transform: scaleX(0); }
  15% { transform: scaleX(0); }
  20%, 25% { transform: scaleX(1); top: calc(100% - 2px); }
  50% { transform: scaleX(1); top: 0px; }
  70% { transform: scaleX(0.2); top: 0px; }
  80%, 100% { transform: scaleX(0.2); top: 0px; }
}

@keyframes clip-path-reveal-1 {
  0%, 25% { clip-path: polygon(0 100%, 100% 100%, 100% 100%, 0% 100%); }
  50% { clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%); }
}
</style>
</head>
<body>
<div class="logo-container">
  <h1 id="page-logo">Welcome, are you</h1>
</div>
<h1>
  <span><a href="student.php">Student</a></span><br>
  <span>Or</span><br>
  <span><a href="admin.php">Admin</a></span>
</h1>
</body>
</html>
