<?php
session_start();
//include "login.php";
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    //print($_SESSION['username']);


?>
<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="file.js"></script>
    
    <link rel="stylesheet" type="text/css" href="style_home.css">
	<link rel="shortcut icon" href="#">
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
    
</head>

<body>
    <script type="text/javascript">
    var stage=0;
    
    function switchTo(username){
        if (stage == 0){
            stage = 1;
            document.getElementById('switchToSpinner').style.display = "block";
            //console.log("switchToSpinner set to block");
            showAllBook(username);
            document.getElementById('switchToSpinner').style.display = "none";
            
        }
        else{
            stage = 0;
            document.getElementById('switchToSpinner').style.display = "block";
            showAllSite(username);
            document.getElementById('switchToSpinner').style.display = "none";
            
        }
    }

    function showAll(username){
        if (stage==0){
            document.getElementById('refreshSpinner').style.display = "block";
            showAllSite(username);
            document.getElementById('refreshSpinner').style.display = "none";
            
        }
        else{
            document.getElementById('refreshSpinner').style.display = "block";
            showAllBook(username);
            document.getElementById('refreshSpinner').style.display = "none";
            
        }
    }
    
    

    
    
    </script>
    <div class="content">

	<div class="container-fluid">
        <div class="row">
    		<div class="col-10"><h1><?php echo $_SESSION['name']; ?>'s BookMark   <button type="button" class="btn btn-outline-secondary btn-lg" onclick="showAll(<?php echo $_SESSION['username']; ?>)">Refresh</button><div id="refreshSpinner"><div  class="spinner-border text-muted"></div></div>
    		          <button type="button" class="btn btn-outline-secondary btn-lg" onclick="switchTo(<?php echo $_SESSION['username']; ?>)">Switch content</button><div id="switchToSpinner" ><div class="spinner-border text-muted"></div></div></h1>
    		</div>
    		
    		<div class="col-2"><h1><a href="logout.php"><button type="button" class="btn btn-outline-secondary btn-lg">Logout</button></a></h1>
    		</div>
        </div><br><br>
        
    </div>
	<div class="box-left" style="display:none;">
		<div class="row">
			<div class="col"><h4 style="text-align:left;">>ALL</h4></div>
		</div>
		<div class="row">
			<div class="col"><h4 style="text-align:left;">Group 1</h4></div>
		</div>
		<div class="row">
			<div class="col"><h4 style="text-align:left;">Group 2</h4></div>
		</div>
		<div class="row">
			<div class="col"><h4 style="text-align:left;">Group 3</h4></div>
		</div>
	</div>
	<div class="box-right">
	    
	    <div id="bookmarks">
    	    <div class="row">
              <div class="col">
                <h4 style="text-align:left;">New bookmark</h4><br>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <h4 style="text-align:left;"><label><b>Name</b></label>
                <input type="text" placeholder="Enter name" name="name" id="newName" required>
                <label><b>URL</b></label>
                <input type="text" placeholder="Enter Url" name="url" id="newUrl" required>
            
                <button type="submit" class="btn btn-outline-secondary" onclick="addBookmark(document.getElementById('newName').value, document.getElementById('newUrl').value,<?php echo $_SESSION['username']; ?>)">Add</button></h4>
                
              </div>
            </div>
    		<div class="searchCol">
        		<div class="row">
        			<div class="col"><h4><input type="text" placeholder="Enter keyword" name="keyword" id="keyword" required> <button type="submit" class="btn btn-outline-secondary" onclick="search(document.getElementById('keyword').value, 0,<?php echo $_SESSION['username']; ?>)">Search</button></h4></div>
        		</div>
    		</div>
    		<div class="buttonCol">
        		<div class="row">
        			<div class="col-6"><h4>All bookmarks<button type="button" class="btn btn-outline-secondary btn-lg" style="visibility: hidden;">&#9650</button></h4></div>
        			<div class="col-3"><h4>Date created  <button type="button" class="btn btn-outline-secondary btn-lg" onclick="sortByDateCreatedASC(stage, <?php echo $_SESSION['username']; ?>)">&#9650</button><button type="button" class="btn btn-outline-secondary btn-lg" onclick="sortByDateCreatedDESC(stage,<?php echo $_SESSION['username']; ?>)">&#9660</button></h4></div>
        			<div class="col-3"><h4>Date modified <button type="button" class="btn btn-outline-secondary btn-lg" onclick="sortByDateModifiedASC(stage,<?php echo $_SESSION['username']; ?>)">&#9650</button></button><button type="button" class="btn btn-outline-secondary btn-lg" onclick="sortByDateModifiedDESC(stage, <?php echo $_SESSION['username']; ?>)">&#9660</button></h4></div>
        			<!--
        			<div class="col"><h4><button type="button" class="btn btn-outline-secondary btn-lg">Edit</button></h4></div>
        			<div class="col"><h4><button type="button" class="btn btn-outline-secondary btn-lg">Delete</button></h4></div>
        			-->
        			
        		</div>
    		</div>
		    <div class="form-popup" id="editForm">
                  <form class="form-container">
                    <h1>Edit bookmark</h1>
                
                    <label><b>Current name</b></label>
                    <input type="text" placeholder="Enter current name" name="name" id="oldNameField"  readonly>
                
                    <label><b>Current URL</b></label>
                    <input type="text" placeholder="Enter current url" name="url" id="oldURLField"  readonly>
                    
                    <label><b>New name</b></label>
                    <input type="text" placeholder="Enter new name" name="url" id="newNameField" required>
                    
                    <label><b>New URL</b></label>
                    <input type="text" placeholder="Enter new url" name="url" id="newURLField" required>
                
                    <button type="submit" class="btn btn-outline-primary" onclick="editSite(document.getElementById('oldNameField').value, document.getElementById('oldURLField').value,<?php echo $_SESSION['username']; ?>, document.getElementById('newNameField').value,document.getElementById('newURLField').value)">Save</button>
                    <button type="submit" class="btn btn-outline-secondary" onclick="closeForm()">Cancel</button>
                  </form>
            </div>
    		<!-- site content -->
    		<div id="siteAttribute">
    		    <div id="siteContent" onload="showAll(<?php echo $_SESSION['username']; ?>)">

                    <div class='row'><div class='col-4'><h5>Name</h5></div><div class='col-4'><h5>address</h5></div><div class='col-1'><h5>created </h5></div><div class='col-1'><h5>modified</h5></div><div class='col-1'></div><div class='col-1'></div></div>
                    <div><br></div>
                    <div id="siteSpinner"><div class="spinner-border text-muted"></div></div>
    		        <div id="defaultArrangement"></div>
    		        <div id="sortByDateCreatedArrangementASC"></div>
    		        <div id="sortByDateCreatedArrangementDESC"></div>
    		        <div id="sortByDateModifiedArrangementASC"></div>
    		        <div id="sortByDateModifiedArrangementDESC"></div>
    		        <div id="searchArrangement"></div>
    		        <!--
    		        <div id="test"><div class='row'><div class='col'><h5><a href="http://youtube.com"target='_blank'>YouTube</a></h5></div><div class='col' style='overflow:hidden;'><h5 style='color:grey;'>http://youtube.com</h5></div><div class='col-1'><h5>2021-4-15</h5></div><div class='col-1'><h5>2021-4-15</h5></div><div class='col-1'><h5><button type="button" class="btn btn-outline-secondary" onclick="openForm('Youtube','http://youtube.com')">Edit</button></h5></div><div class='col-1'><h5><button type="button" class="btn btn-outline-secondary" onclick="deleteSite(<?php echo $_SESSION['username']; ?>, 'YouTube', 'http://youtube.com')">Delete</button></h5></div></div></div>
    		         -->
    		    </div>
    		
    		    
    		</div>
    	</div>
    	
		<div id="books">
		    <div class="row">
		        <!-- new book buttons -->
		        <div class="col">
		            
		        <h4 style="text-align:left;">New book</h4><br>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
		    
                <h5 style="text-align:left;">
                <label><b>Title</b></label>
                <input type="text" placeholder="Enter a title" name="title" id="newTitle" required>
                <label><b>Author</b></label>
                <input type="text" placeholder="Enter the author" name="author" id="newAuthor" required>
                <input type="text" placeholder="Enter the page if any" name="page" id="newPage">
                <input type="text" placeholder="Enter related sites if any" name="relatedsites" id="newRelatedSites">
                <input type="text" placeholder="your_id" name="userid" value="<?php echo $_SESSION['username'];?>" style="display:none;">
                <button type="submit" class="btn btn-outline-secondary" onclick="addBook(document.getElementById('newTitle').value, document.getElementById('newAuthor').value,document.getElementById('newPage').value, document.getElementById('newRelatedSites').value, <?php echo $_SESSION['username']; ?>)">Add</button>
                
                </h5>
                </div>
              
            </div>
    		<div class="searchCol">
    		    <!-- search book -->
        		<div class="row">
        			<div class="col"><h4><input type="text" placeholder="Enter keyword" name="keyword2" id="keyword2" required> <button type="submit" class="btn btn-outline-secondary" onclick="search(document.getElementById('keyword2').value, 1, <?php echo $_SESSION['username'];?>)">Search</button></h4>
        			</div>
        	    </div>
    		</div>
    		<div class="buttonCol">
    		    <!-- book sorting buttons -->
        		<div class="row">
        			<div class="col"><h4>All books<button type="button" class="btn btn-outline-secondary btn-lg" style="visibility: hidden;">&#9650</button></h4></div>
        			<div class="col"><h4>Author<button type="button" class="btn btn-outline-secondary btn-lg" style="visibility: hidden;">&#9650</button></h4></div>
        			<div class="col"><h4>Date created  <button type="button" class="btn btn-outline-secondary btn-lg" onclick="sortByDateCreatedASC(stage,<?php echo $_SESSION['username']; ?>)">&#9650</button><button type="button" class="btn btn-outline-secondary btn-lg" onclick="sortByDateCreatedDESC(stage,<?php echo $_SESSION['username']; ?>)">&#9660</button></h4></div>
        			<div class="col"><h4>Date modified <button type="button" class="btn btn-outline-secondary btn-lg" onclick="sortByDateModifiedASC(stage,<?php echo $_SESSION['username']; ?>)">&#9650</button></button><button type="button" class="btn btn-outline-secondary btn-lg" onclick="sortByDateModifiedDESC(stage,<?php echo $_SESSION['username']; ?>)">&#9660</button></h4></div>
        			<!--
        			<div class="col"><h4><button type="button" class="btn btn-outline-secondary btn-lg">Edit</button></h4></div>
        			<div class="col"><h4><button type="button" class="btn btn-outline-secondary btn-lg">Delete</button></h4></div>
        			-->
        		</div>
    		</div>
    		
    		<!-- book content list-->
    		<div id="bookAttribute">
    		
    		    <div id="bookContent">
    		        <div class="form-popup" id="editFormB">
                      <form class="form-container">
                        <h1>Edit book</h1>
                    
                        <label><b>Current title</b></label>
                        <input type="text" placeholder="Enter current name" name="title" id="oldTitleField" readonly>
                    
                        <label><b>Current author</b></label>
                        <input type="text" placeholder="Enter current url" name="author" id="oldAuthorField" readonly>
                        
                        <label><b>Current page</b></label>
                        <input type="text" placeholder="Enter current page" name="page" id="oldPageField" readonly>
                    
                        <label><b>Current related sites</b></label>
                        <input type="text" placeholder="Enter current related sites" name="RelatedSites" id="oldRelatedSitesField" readonly>
                        
                        
                        <label><b>New title</b></label>
                        <input type="text" placeholder="Enter new title" name="newTitle" id="newTitleField" required>
                        
                        <label><b>New author</b></label>
                        <input type="text" placeholder="Enter new author" name="newAuthor" id="newAuthorField" required>
                        
                        <label><b>New page</b></label>
                        <input type="text" placeholder="Enter new page" name="newPage" id="newPageField" >
                        
                        <label><b>New related sites</b></label>
                        <input type="text" placeholder="Enter new related sites" name="newRelatedSites" id="newRelatedSitesField" >
                        
                        <button type="submit" class="btn btn-outline-primary" onclick="editSiteB(document.getElementById('oldTitleField').value, document.getElementById('oldAuthorField').value,document.getElementById('oldPageField').value, document.getElementById('oldRelatedSitesField').value,<?php echo $_SESSION['username']; ?>, document.getElementById('newTitleField').value,document.getElementById('newAuthorField').value, document.getElementById('newPageField').value,document.getElementById('newRelatedSitesField').value)">Save</button>
                        <button type="submit" class="btn btn-outline-secondary" onclick="closeForm()">Cancel</button>
                      </form>
                    </div>
                    <div class='row'><div class='col-3'><h5>Title</h5></div><div class='col-2'><h5>Author</h5></div><div class='col-1'><h5>created </h5></div><div class='col-1'><h5>modified</h5></div><div class='col-1'><h5>page</h5></div><div class='col-2'><h5>related websites</h5></div>
                    </div>
                    <div><br></div>
                    <div  id="bookSpinner"><div class="spinner-border text-muted"></div></div>
    		        <div id="defaultArrangementB"></div>
    		        <div id="sortByDateCreatedArrangementASCB"></div>
    		        <div id="sortByDateCreatedArrangementDESCB"></div>
    		        <div id="sortByDateModifiedArrangementASCB"></div>
    		        <div id="sortByDateModifiedArrangementDESCB"></div>
    		        <div id="searchArrangementB"></div>
    		        <!--
    		        <div id="test"><div class='row'><div class='col'><h5><a href="http://youtube.com"target='_blank'>YouTube</a></h5></div><div class='col' style='overflow:hidden;'><h5 style='color:grey;'>http://youtube.com</h5></div><div class='col-1'><h5>2021-4-15</h5></div><div class='col-1'><h5>2021-4-15</h5></div><div class='col-1'><h5><button type="button" class="btn btn-outline-secondary" onclick="openForm('Youtube','http://youtube.com')">Edit</button></h5></div><div class='col-1'><h5><button type="button" class="btn btn-outline-secondary" onclick="deleteSite(<?php echo $_SESSION['username']; ?>, 'YouTube', 'http://youtube.com')">Delete</button></h5></div></div></div>
    		         -->
    		    </div>
    		
    		    
    		</div>
    		
		</div>
	</div>
	
    </div>
    
    
</body>


</html>

<?php
}
else{
    header("Location: index.php");
}
?>