<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
  margin-left: 0;
  margin-right: 0;
}

/* Style tab links */
.tablink {
  background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 0px;
  font-size: 10px;
  width: 25%;
  margin-top: 28px;
  position: fixed;
}


/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: black;
  display: none;
  padding: 80px 10px;
  height: 93%;
  margin-top: -30px;
  background-color: #f9f9f9;
}



.navbar3 {
  overflow: hidden;
  background-color: #1c50a5;
  position: fixed;
  top: 0;
  width: 100%;
}



.navbar6 {
  overflow: hidden;
  background-color: #346ac1;
  position: fixed;
  top: 6%;
  width: 100%;
}

.navbar6 a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 10px 10px;
  text-decoration: none;
  font-size: 12px;
}

.navbar6 a:hover {
  background: #f1f1f1;
  color: black;
}

.navbar6 a.active {
  background-color: lightblue;
  color: white;
}


.keluar{
  float: left;
  display: block;
  color: white;
  text-align: right;
  padding: 10px 10px;
  text-decoration: none;
  font-size: 10px;
}

.logo {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 10px 10px;
  text-decoration: none;
  font-size: 15px;
}





.navbar5 {
  overflow: hidden;
  background-color: #346ac1;
  position: fixed;
  bottom: 0%;
  width: 100%;
}

.navbar5 a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 10px 10px;
  text-decoration: none;
  font-size: 12px;
}

.navbar5 a:hover {
  background: #f1f1f1;
  color: black;
}

.navbar5 a.active {
  background-color: lightblue;
  color: white;
}

</style>



<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  background: #f9f9f9;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: silver;
  cursor: pointer;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
}
</style>



</head>
<body bgcolor="#f9f9f9">

<div class="navbar3">
  <a href="#home" class="logo">IT SERVICES</a>
  <a href="#home" class="keluar">Logout</a>
</div>


<div class="navbar6">
  <a onclick="openPage('Home')" id="defaultOpen">Berjalan</a>
  <a onclick="openPage('News')">Closed</a>
  <a onclick="openPage('Contact')">Barang Masuk</a>
</div>

<div id="Home" class="tabcontent">


  <h4>Pengajuan User</h4>

						<div id="btnContainer">
						  <button class="btn" onclick="listView()"><i class="fa fa-bars"></i> List</button> 
						  <button class="btn active" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
						</div>
						<br>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Nomor Pengajuan" title="Search Number">



						<div class="row">

						  <div class="column">
							<p><font size="2"><b>01222334</b></font></p>
							<p>
								<img src="img_user/user.png" width="20px" />
									<font size="2">Waiting</font>
							</p>
							<p><font size="2">Tolong Di Cek</font></p>
							<p><hr/></p>
						  </div>
						  <div class="column">
							<p><font size="2"><b>01222334</b></font></p>
							<p>
								<img src="img_user/user.png" width="20px" />
									<font size="2">Waiting</font>
							</p>
							<p><font size="2">Tolong Di Cek</font></p>
							<p><hr/></p>
						  </div>
						  <div class="column">
							<p><font size="2"><b>01222334</b></font></p>
							<p>
								<img src="img_user/user.png" width="20px" />
									<font size="2">Waiting</font>
							</p>
							<p><font size="2">Tolong Di Cek</font></p>
							<p><hr/></p>
						  </div>
						  <div class="column">
							<p><font size="2"><b>01222334</b></font></p>
							<p>
								<img src="img_user/user.png" width="20px" />
									<font size="2">Waiting</font>
							</p>
							<p><font size="2">Tolong Di Cek</font></p>
							<p><hr/></p>
						  </div>
						  <div class="column">
							<p><font size="2"><b>01222334</b></font></p>
							<p>
								<img src="img_user/user.png" width="20px" />
									<font size="2">Waiting</font>
							</p>
							<p><font size="2">Tolong Di Cek</font></p>
							<p><hr/></p>
						  </div>
						  <div class="column">
							<p><font size="2"><b>01222334</b></font></p>
							<p>
								<img src="img_user/user.png" width="20px" />
									<font size="2">Waiting</font>
							</p>
							<p><font size="2">Tolong Di Cek</font></p>
							<p><hr/></p>
						  </div>
						  <div class="column">
							<p><font size="2"><b>01222334</b></font></p>
							<p>
								<img src="img_user/user.png" width="20px" />
									<font size="2">Waiting</font>
							</p>
							<p><font size="2">Tolong Di Cek</font></p>
							<p><hr/></p>
						  </div>
						  <div class="column">
							<p><font size="2"><b>01222334</b></font></p>
							<p>
								<img src="img_user/user.png" width="20px" />
									<font size="2">Waiting</font>
							</p>
							<p><font size="2">Tolong Di Cek</font></p>
							<p><hr/></p>
						  </div>
						  
						</div>


</div>

<div id="News" class="tabcontent">
  <h4>News</h4>
  <p>Some news this fine day!</p> 
</div>

<div id="Contact" class="tabcontent">
  <h4>Contact</h4>
  <p>Get in touch, or swing by for a cup of coffee.</p>
</div>

<div id="About" class="tabcontent">
  <h4>About</h4>
  <p>Who we are and what we do.</p>
</div>


<div id="Stock" class="tabcontent">
  <h4>Stock</h4>
  <p>Who we are and what we do.</p>
</div>

<div id="Riwayat" class="tabcontent">
  <h4>Riwayat</h4>
  <p>Who we are and what we do.</p>
</div>

<div id="bm" class="tabcontent">
  <h4>bm</h4>
  <p>Who we are and what we do.</p>
</div>

<div id="Setting" class="tabcontent">
  <h4>Setting</h4>
  <p>Who we are and what we do.</p>
</div>



<div class="navbar5">
  <a onclick="openPage('stock')">Berjalan</a>
  <a onclick="openPage('riwayat')">Closed</a>
  <a onclick="openPage('setting')">Barang Masuk</a>
</div>




<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>





						<script>
						// Get the elements with class="column"
						var elements = document.getElementsByClassName("column");

						// Declare a loop variable
						var i;

						// List View
						function listView() {
						  for (i = 0; i < elements.length; i++) {
							elements[i].style.width = "100%";
						  }
						}

						// Grid View
						function gridView() {
						  for (i = 0; i < elements.length; i++) {
							elements[i].style.width = "50%";
						  }
						}

						/* Optional: Add active class to the current button (highlight it) */
						var container = document.getElementById("btnContainer");
						var btns = container.getElementsByClassName("btn");
						for (var i = 0; i < btns.length; i++) {
						  btns[i].addEventListener("click", function() {
							var current = document.getElementsByClassName("active");
							current[0].className = current[0].className.replace(" active", "");
							this.className += " active";
						  });
						}
						</script>


<script>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>

   
</body>
</html> 
