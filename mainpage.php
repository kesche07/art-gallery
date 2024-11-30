<html>
<link rel="stylesheet" type="text/css" href="p3.css">
<script src="script.js"></script>
<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="contact.php">Contact</a>
  <a href="about.php">About</a>
</div>


  <!-- Image text -->
  <div id="imgtext"></div>
</div>
<div class="row">
  <div class="column">
    <img src="https://www.startpage.com/av/proxy-image?piurl=http%3A%2F%2Fwww.pixelstalk.net%2Fwp-content%2Fuploads%2F2016%2F07%2FDownload-Studio-Ghibli-HD-Wallpapers-1.jpg&sp=1732983404T04114c0f36ca350a92426872066d480a9e3da38f42e71ca1b0d5a3eef75b0b7a" alt="Spirited Away" onclick="myFunction(this);">
  </div>
  <div class="column">
    <img src="https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.ymWtCCIVgok0Ojge5VjlwQHaEK%26pid%3DApi&sp=1732984359Tfa1a6eb241d08107f3c9e4215e37d6b53ce8c323bc240bee9f88db819a94ed42" alt="My Neighbour Totoro" onclick="myFunction(this);">
  </div>
  <div class="column">
    <img src="https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP.4Bxm8VqIH1ZoPbWqnb3d5QHaEC%26pid%3DApi&sp=1732984334Te861d84c884775aa8a187246da117b337d7a45e03d22d0ed28d2be4736fd9a61" alt="Howls Moving Castle" onclick="myFunction(this);">
  </div>
  <div class="column">
    <img src="https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.bva0FR0SL2HTQ1JK2XcqxwHaE8%26pid%3DApi&sp=1732983404T2a6e36b01d786fd6445ce1ea9e3e5477cf594743a5c301f534a188323960edc8" alt="Ponyo" onclick="myFunction(this);">
  </div>
</div>
<div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="img01">
</div>
<!-- The expanding image container -->
<div class="container">
  <!-- Close the image -->
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

  <!-- Expanded image -->
  <img id="expandedImg" style="width:100%">

</html>