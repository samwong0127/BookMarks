
var count1=0, count2=0,count3=0,count4=0, count5=0, count6=0,count7=0,count8=0;
var countShowAllSite=0, countShowAllBook=0;

function openForm(stage, name,url, username) {
    document.getElementById("editForm").style.display = "block";
    document.getElementById("oldNameField").value=name;
    document.getElementById("oldURLField").value=url;
}
function openFormB(stage, title, author, page, relatedSites, username) {
    document.getElementById("editFormB").style.display = "block";
    document.getElementById("oldTitleField").value=title;
    document.getElementById("oldAuthorField").value=author;
    document.getElementById("oldPageField").value=page;
    document.getElementById("oldRelatedSitesField").value=relatedSites;
    
}
function closeForm() {
  document.getElementById("editForm").style.display = "none";
  document.getElementById("editFormB").style.display = "none";
  document.getElementById("newNameField").value="";
  document.getElementById("newURLField").value="";
    document.getElementById("oldTitleField").value="";
    document.getElementById("oldAuthorField").value="";
    document.getElementById("oldPageField").value='';
    document.getElementById("oldRelatedSitesField").value='';
  
}



function sortByDateCreatedASC(stage, username){
    console.log("sortByDateCreatedASC entered with" + stage + " "+username);
    sortByDate(stage, username, 0, 1);
}
function sortByDateCreatedDESC(stage, username){

    sortByDate(stage, username, 1, 1);
}
function sortByDateModifiedASC(stage, username){

    sortByDate(stage, username, 0, 0);
}
function sortByDateModifiedDESC(stage, username){

    sortByDate(stage, username, 1, 0);
}

function sortByDate(stage, username, order, attribute){
    console.log("sortByDate entered");
    var data={
            userid:username,
            order:order,
            attribute:attribute
    };
    var dest;
    if (order==0 && attribute==1){
        if(stage==0){
            dest = "sortByDateCreatedArrangementASC";
            document.getElementById("sortByDateCreatedArrangementDESC").style.display="none";
            document.getElementById("sortByDateModifiedArrangementASC").style.display="none";
            document.getElementById("sortByDateModifiedArrangementDESC").style.display="none";
            document.getElementById("defaultArrangement").style.display="none";
            document.getElementById("searchArrangement").style.display="none";
        }
        else{
            dest = "sortByDateCreatedArrangementASCB";
            document.getElementById("sortByDateCreatedArrangementDESCB").style.display="none";
            document.getElementById("sortByDateModifiedArrangementASCB").style.display="none";
            document.getElementById("sortByDateModifiedArrangementDESCB").style.display="none";
            document.getElementById("defaultArrangementB").style.display="none";
            document.getElementById("searchArrangementB").style.display="none";
        }
        
        
        if (count1>0 || count5>0){
            if(stage==0){
                document.getElementById("sortByDateCreatedArrangementASC").style.display="block";
            }
            if(stage==1){
                document.getElementById("sortByDateCreatedArrangementASCB").style.display="block";
            }
            alert("Refreshed");
            return;
        }
        if(stage==0){
            count1++;
        }
        if(stage==1){
            count5++;
        }
        
    }
    else if (order==1 && attribute==1){
        if(stage==0){
            dest = "sortByDateCreatedArrangementDESC";
            document.getElementById("sortByDateCreatedArrangementASC").style.display="none";
            document.getElementById("sortByDateModifiedArrangementASC").style.display="none";
            document.getElementById("sortByDateModifiedArrangementDESC").style.display="none";
            document.getElementById("defaultArrangement").style.display="none";
            document.getElementById("searchArrangement").style.display="none";
        }
        else{
            dest = "sortByDateCreatedArrangementDESCB";
            document.getElementById("sortByDateCreatedArrangementASCB").style.display="none";
            document.getElementById("sortByDateModifiedArrangementASCB").style.display="none";
            document.getElementById("sortByDateModifiedArrangementDESCB").style.display="none";
            document.getElementById("defaultArrangementB").style.display="none";
            document.getElementById("searchArrangementB").style.display="none";
        }

        if (count2>0 || count6>0){
            if(stage==0){
                document.getElementById("sortByDateCreatedArrangementDESC").style.display="block";
            }
            
            if(stage==1){
                document.getElementById("sortByDateCreatedArrangementDESCB").style.display="block";
            }
            alert("Refreshed");
            return;
        }
        if(stage==0){
            count2++;
        }
        if(stage==1){
            count6++;
        }
    }
    else if (order==0 && attribute==0){
        if(stage==0){
            dest = "sortByDateModifiedArrangementASC";
            document.getElementById("sortByDateCreatedArrangementDESC").style.display="none";
            document.getElementById("sortByDateCreatedArrangementASC").style.display="none";
            document.getElementById("sortByDateModifiedArrangementDESC").style.display="none";
            document.getElementById("defaultArrangement").style.display="none";
            document.getElementById("searchArrangement").style.display="none";
        }
        else{
            dest = "sortByDateModifiedArrangementASCB";
            document.getElementById("sortByDateCreatedArrangementDESCB").style.display="none";
            document.getElementById("sortByDateCreatedArrangementASCB").style.display="none";
            document.getElementById("sortByDateModifiedArrangementDESCB").style.display="none";
            document.getElementById("defaultArrangementB").style.display="none";
            document.getElementById("searchArrangementB").style.display="none";
        }
        
        if (count3>0 || count7>0){
            if(stage==0){
                document.getElementById("sortByDateModifiedArrangementASC").style.display="block";
            }
            if(stage==1){
                document.getElementById("sortByDateModifiedArrangementASCB").style.display="block";
            }
            alert("Refreshed");
            return;
        }
        if(stage==0){
            count3++;
        }
        if(stage==1){
            count7++;
        }
    }
    else if (order==1 && attribute==0){
        if (stage==0){
            dest = "sortByDateModifiedArrangementDESC";
            document.getElementById("sortByDateCreatedArrangementDESC").style.display="none";
            document.getElementById("sortByDateCreatedArrangementASC").style.display="none";
            document.getElementById("sortByDateModifiedArrangementASC").style.display="none";
            document.getElementById("defaultArrangement").style.display="none";
            document.getElementById("searchArrangement").style.display="none";
        }
        else{
            dest = "sortByDateModifiedArrangementDESCB";
            document.getElementById("sortByDateCreatedArrangementDESCB").style.display="none";
            document.getElementById("sortByDateCreatedArrangementASCB").style.display="none";
            document.getElementById("sortByDateModifiedArrangementASCB").style.display="none";
            document.getElementById("defaultArrangementB").style.display="none";
            document.getElementById("searchArrangementB").style.display="none";
        }
        
        if (count4>0 || count8>0){
            if(stage==0){
                document.getElementById("sortByDateModifiedArrangementDESC").style.display="block";
            }
            if(stage==1){
                document.getElementById("sortByDateModifiedArrangementDESCB").style.display="block";
            }
            
            alert("Refreshed");
            return;
        }
        if(stage==0){
            count4++;
        }
        if(stage==1){
            count8++;
        }
    }
    var link;
    if (stage == 0){
        link="https://esculapian-gangs.000webhostapp.com/webapp/sortSiteByDateOrder.php";
        console.log("entering getContentFromServer()");
        getContentFromServer(stage, username, link, data, dest);
    }
    else{
        link="https://esculapian-gangs.000webhostapp.com/webapp/sortBookByDateOrder.php";
        getContentFromServer(stage, username, link, data, dest);
    }
}
/*
function fetchToDest(site, dest) {
    
    var data4 = "<div class='row'><div class='col'><h5><a href='"+site.url+"' target='_blank'>"+site.name+"</a></h5></div><div class='col' style='overflow:hidden;'><h5 style='color:grey;'>"+url+"</h5></div><div class='col-1'><h5>"+site.dateCreated+"</h5></div><div class='col-1'><h5>"+site.dateModified+"</h5></div><div class='col-1'><h5>Edit</h5></div><div class='col-1'><h5>Delete</h5></div></div>";
	   
	document.getElementById(dest).innerHTML += data4;
	    
}
*/

function addBookmark(name, url, username){
    if (name=="" || url==""){
        alert('Name or Url of a new bookmark must be filled');
        return;
    }
    //name="\""+name+"\"";
    console.log("addBookmark() entered");
    document.getElementById("newName").value="";
    document.getElementById("newUrl").value="";
    count1=count2=count3=count4=countShowAllSite=0;
    var showSiteAPIURL = "https://esculapian-gangs.000webhostapp.com/webapp/insertSite.php";
    
    /*
    
    var header={
        'Accept': 'application/json',
        'Content-Type':'application/json'
    };
    
    var data={
        userid:username
        ,name:name
        ,url:url
    };
    
    console.log(JSON.stringify(data));
    fetch(
		showSiteAPIURL,{
			method:'POST',
			headers:header,
			body: [JSON.stringify(data)]
		}
	)
	.then((response)=>response.json())
	.then((response)=>{
	    
	    console.log(response);
        if(response==1){
            alert("Bookmark added. Click Refresh button to view changes.");
            
        }
        else if (response==0){
            alert("Bookmark name is duplicated.");
        }
        else{
            alert("Bookmark not added. Check if there is invalid characters in input fields");
            
        }
	})
	
	*/
	// below try to use AJAX to send data
	
	 //var xhttp = new XMLHttpRequest();
	/*
	$.post(showSiteAPIURL,
    {
        userid:username,
        name: name,
        url: url
    },
    function(){
    alert("Bookmark: " + name + " added. Click Refresh to view.");
    });
    */
    $.ajax({
        type: "POST",
        url: showSiteAPIURL,
        data: "name=" + name + "&url=" + url + "&userid=" + username,
        success: function(response){
            console.log(response);
            if (response == 1) {
                alert( "Bookmark of name: " + name +" is added! Click Refresh to view.");
            }
            else if (response == 0){
                alert( "Bookmark name: " + name +" is duplicated.");
            }
            else{
                alert("Bookmark not added due to: "+response);
            }
        }
    });

}



function addBook(title, author, page, relatedSites, username){
    if (title == "" || author == ""){
        alert('Title and author of a new book must be filled');
        return;
    }
    if (page == "" || page == null){
        page = 0;
    }
    if(relatedSites == null){
        relatedSites = "";
    }
    //title="\""+title+"\"";
    console.log("addBook entered title: "+title+" author: "+author+" page: "+page+" related sites: "+relatedSites);
    document.getElementById("newTitle").value="";
    document.getElementById("newAuthor").value="";
    document.getElementById("newPage").value="";
    document.getElementById("newRelatedSites").value="";
    
    
        
    /*
    var showSiteAPIURL = "https://esculapian-gangs.000webhostapp.com/webapp/insertBook2.php";
    $.ajax({
        type: "POST",
        url: showSiteAPIURL,
        data: "title=" + title + "&author=" + author + "&page=" + page+ "&relatedSites=" + relatedSites+ "&userid=" + username,
        success: function(response){
            console.log(response);
            if (response == 1) {
                alert( "Book: " + title +" added! Click Refresh to view.");
            }
            else{
                alert("Book: "+title+" not added because: "+response);
            }
        }
    });
    
    */
    
    var showSiteAPIURL = "https://esculapian-gangs.000webhostapp.com/webapp/insertBook.php";
    
    var header={
        'Accept': 'application/json',
        'Content-Type':'application/json'
    };
    
    var data={
        userid:username
        ,title:title
        ,author:author
        ,page:page
        ,relatedSites:relatedSites
    };
    console.log(JSON.stringify(data));
    
    fetch(
		showSiteAPIURL,{
			method:'POST',
			headers:header,
			body: JSON.stringify(data)
		}
	)
	.then((response)=>response.json())
	.then((response)=>{
	    
	    console.log(response);
        if(response==1){
            alert("Book with title: "+title+" is added. Click Refresh button to view changes.");
            
        }
        else if (response==0){
            alert("Book title is duplicated.");
        }
        else{
            alert("Book not added. Check if there is invalid characters in input fields");
            
        }
        count5=count6=count7=count8=countShowAllBook=0;
    
	})
	.catch((error)=>{
	    console.log(error);
	})
    
    
    
}



function deleteSite(stage, name, url, username){
    console.log("deleteSite entered with "+stage+" "+name+" "+url+" "+username+"\n");
    if (stage==0){
        console.log("going to delete Site");
        var showSiteAPIURL = "https://esculapian-gangs.000webhostapp.com/webapp/deleteSite.php";
        var data = {
            userid:username
            ,name:name
            ,url:url
            ,stage:stage
        };
    }
    else{
        console.log("going to delete Book");
        var showSiteAPIURL = "https://esculapian-gangs.000webhostapp.com/webapp/deleteBook.php";
        var data = {
            userid:username
            ,title:name
            ,author:url
            ,stage:stage
        };
    }
    
    //console.log(JSON.stringify(data));
    var header={
        'Accept': 'application/json',
        'Content-Type':'application/json'
    };
    //alert("Bookmark/Book of name: "+ name+" removed. Click Refresh button to view changes.");
    fetch(
		showSiteAPIURL,{
			method:'POST',
			headers:header,
			body: JSON.stringify(data)
		}
	)
	.then((response)=>response.json())
	.then((response)=>{
	    count1=count2=count3=count4=count5=count6=count7=count8=countShowAllSite=countShowAllBook=0;
	    console.log(response);
	    if(stage==0){
            alert("Bookmark of name: "+ name+" is removed. Click Refresh button to view changes.");
	    }
	    else{
	        alert("Book of title: "+ name+" is removed. Click Refresh button to view changes.");
	    }
	})
	.catch((error)=>{
	    console.log(error);
	});
}

function editSite(name, url, username, newName, newUrl){
    var showSiteAPIURL = "https://esculapian-gangs.000webhostapp.com/webapp/updateSite.php";
    var data = {
        userid:username
        ,oldName:name
        ,oldUrl:url
        ,newUrl:newUrl
        ,newName:newName
    };
    //console.log(JSON.stringify(data));
    var header={
        'Accept': 'application/json',
        'Content-Type':'application/json'
    };
    fetch(
		showSiteAPIURL,{
			method:'POST',
			headers:header,
			body: JSON.stringify(data)
		}
	)
	.then((response)=>response.json())
	.then((response)=>{
	    if(response==1){
	        // do something
	    }
	    //console.log(response);
	    count1=count2=count3=count4=countShowAllSite=0;
        alert("Bookmark with name: "+ name +" is edited. Click Refresh button to view changes.");
	})
	.catch((error)=>{
	    console.log(error);
	});
	
	closeForm();
}

function isInteger(value) {
  return /^\d+$/.test(value);
}

function editSiteB(title, author, page, relatedSites, username, newTitle, newAuthor, newPage, newRelatedSites){
    if(!isInteger(page)){
        alert("Page must be an integer!");
        return;
    }
    if (newPage == '' || newPage == null){
        newPage = page;
    }
    if (newRelatedSites == '' || newRelatedSites == null){
        newRelatedSites = relatedSites;
    }
    var showSiteAPIURL = "https://esculapian-gangs.000webhostapp.com/webapp/updateBook.php";
    var data = {
        userid:username
        ,oldTitle:title
        ,oldAuthor:author
        ,oldPage:page
        ,oldRelatedSites:relatedSites
        ,newTitle:newTitle
        ,newAuthor:newAuthor
        ,newPage:newPage
        ,newRelatedSites:newRelatedSites
        
    };
    //console.log(JSON.stringify(data));
    var header={
        'Accept': 'application/json',
        'Content-Type':'application/json'
    };
    fetch(
		showSiteAPIURL,{
			method:'POST',
			headers:header,
			body: JSON.stringify(data)
		}
	)
	.then((response)=>response.json())
	.then((response)=>{
	    if(response==1){
	        // do something
	    }
	    //console.log(response);
	    count5=count6=count7=count8=countShowAllBook=0;
        alert("Book with title: "+ title +" is edited. Click Refresh button to view changes.");
	})
	.catch((error)=>{
	    console.log(error);
	});
	
	closeForm();
}

function search(keyword, stage, username){
    if (keyword==""){
        alert('keyword must be filled');
        return;
    }
    if (stage == 0){
        document.getElementById("books").style.display="none";
        document.getElementById("searchArrangement").style.display="block";
        document.getElementById("sortByDateCreatedArrangementDESC").style.display="none";
        document.getElementById("sortByDateCreatedArrangementASC").style.display="none";
        document.getElementById("sortByDateModifiedArrangementASC").style.display="none";
        document.getElementById("sortByDateModifiedArrangementDESC").style.display="none";
        document.getElementById("defaultArrangement").style.display="none";
    
    }
    else{
        document.getElementById("bookmarks").style.display="none";
        document.getElementById("searchArrangementB").style.display="block";
        document.getElementById("sortByDateCreatedArrangementDESCB").style.display="none";
        document.getElementById("sortByDateCreatedArrangementASCB").style.display="none";
        document.getElementById("sortByDateModifiedArrangementASCB").style.display="none";
        document.getElementById("sortByDateModifiedArrangementDESCB").style.display="none";
        document.getElementById("defaultArrangementB").style.display="none";
    }
    
    var showSiteAPIURL = "https://esculapian-gangs.000webhostapp.com/webapp/search.php";
    
    
    var data={
        userid:username,
        keyword:keyword,
        stage:stage
        
    };
    
    if (stage == 0){
        getContentFromServer(stage,username,showSiteAPIURL, data, "searchArrangement");
    }
    else{
        getContentFromServer(stage,username,showSiteAPIURL, data, "searchArrangementB");
    
    }
	
}

function getContentFromServer(stage,username, link, data, dest){
    if(stage==0){
        document.getElementById("siteSpinner").style.display="block";
        console.log("siteSpinner");
    }
    if(stage==1){
        document.getElementById("bookSpinner").style.display="block";
        
    }
    document.getElementById("refreshSpinner").style.display="block";
    document.getElementById("refreshSpinner").style.display="block";
        
    if (document.getElementById(dest) != null){
        document.getElementById(dest).innerHTML = "";
    }
    var showSiteAPIURL = link;

    var header={
        'Accept': 'application/json',
        'Content-Type':'application/json'
    };

    
	var id, url, name, dateCreated, dateModified;
	console.log(JSON.stringify(data));
	fetch(
		showSiteAPIURL,{
			method:'POST',
			headers:header,
			body: JSON.stringify(data)
		}
		
	)
	.then((response)=>response.json())
	.then((response)=>{
	    console.log(response);
	    //var data3 = document.createElement('div');
        //data3.className = "row";
        //Sites = response;
	    for (var i=0;i<response.length;i++){
	        
    		if (stage == 0){
    		    id=response[i]['id'];
        		//console.log(id);
        		url=response[i]['url'];
        		name=response[i]['name'];
        		dateCreated=response[i]['date_created'];
        		dateModified=response[i]['date_modified'];
        		//console.log(response[i]);
    		
        		var deleteSiteString = 'deleteSite(0,\''+name+"', '"+url+"', '"+username+"')";
        	        
        	    var editSiteString = 'openForm(\''+name+"', '"+url+"', '"+username+"')";
        	        //console.log(deleteSiteString);
        	        //deleteSiteString="";
        	    var data4 = "<div class='row'><div class='col'><h5><a href='"+url+"' target='_blank'>"+name+"</a></h5></div><div class='col' style='overflow:hidden;'><h5 style='color:grey;'>"+url+"</h5></div><div class='col-1'><h5>"+dateCreated+"</h5></div><div class='col-1'><h5>"+dateModified+"</h5></div><div class='col-1'><h5><button type='submit' class='btn btn-outline-secondary' onclick=\""+editSiteString+"\">Edit</button></h5></div><div class='col-1'><h5><button type='submit' class='btn btn-outline-secondary' onclick=\""+deleteSiteString+"\">Delete</button></h5></div></div><br>";
    	        
    	        
    	        
    		}
    		else{
    		    id=response[i]['id'];
        		
        		title=response[i]['title'];
        		author=response[i]['author'];
        		dateCreated=response[i]['date_created'];
        		dateModified=response[i]['date_modified'];
        		page=response[i]['page'];
        		related_sites=response[i]['related_sites'];
        		
    		    if (related_sites == "" || related_sites == null){
        		    var linkedSite = "No site yet";
                }
                else{
                    //console.log("entering findRelatedSite with"+related_sites);
                    //console.log(typeof(related_sites));
                    
                    findRelatedSite(related_sites, username);
                    var linkedSite = returnString;
                    
                    console.log(linkedSite);
                }
    	        var deleteSiteString = 'deleteSite(1,\''+title+"', '"+author+"', '"+username+"')";
    	        
    	        var editSiteString = 'openFormB(1,\''+title+"', '"+author+"', '"+page+"', '"+related_sites+"', '"+username+"')";
    	        //console.log(deleteSiteString);
    	        //deleteSiteString="";

    	        var data4 = "<div class='row'><div class='col-3' style='overflow:hidden;'><h5>"+title+"</h5></div><div class='col-2' style='overflow:hidden;'><h5 style='color:grey;'>"+author+"</h5></div><div class='col-1'><h5>"+dateCreated+"</h5></div><div class='col-1'><h5>"+dateModified+"</h5></div><div class='col-1'><h5>"+page+"</h5></div><div class='col-2'><h5>"+linkedSite+"</h5></div><div class='col-1'><h5><button type='submit' class='btn btn-outline-secondary' onclick=\""+editSiteString+"\">Edit</button></h5></div><div class='col-1'><h5><button type='submit' class='btn btn-outline-secondary' onclick=\""+deleteSiteString+"\">Delete</button></h5></div></div><br>";
    		}
    		document.getElementById(dest).innerHTML += data4;
	    }
	})
	.catch((error)=>{
	    console.log(error);
	});
	document.getElementById("bookSpinner").style.display="none";
	document.getElementById("siteSpinner").style.display="none";
	//$("#siteSpinner").hide();
}

function showAllSite(username){
        
        document.getElementById("books").style.display="none";
        document.getElementById("bookmarks").style.display="block";
        document.getElementById("sortByDateCreatedArrangementDESC").style.display="none";
        document.getElementById("sortByDateCreatedArrangementASC").style.display="none";
        document.getElementById("sortByDateModifiedArrangementASC").style.display="none";
        document.getElementById("sortByDateModifiedArrangementDESC").style.display="none";
        document.getElementById("searchArrangement").style.display="none";
        document.getElementById("defaultArrangement").style.display="block";
        
        document.getElementById("refreshSpinner").style.display="block";
        
        if(countShowAllSite>0){
            //alert("Refreshed");
            $("#refreshSpinner").hide();
            return;
        }
        
        document.getElementById("defaultArrangement").innerHTML = "";
        
        var showSiteAPIURL = "https://esculapian-gangs.000webhostapp.com/webapp/showSite.php";

        var header={
            'Accept': 'application/json',
            'Content-Type':'application/json'
        };
    
        var Data={
            userid:username
        };
    	var id, url, name, dateCreated, dateModified;
    	fetch(
    		showSiteAPIURL,{
    			method:'POST',
    			headers:header,
    			body: JSON.stringify(Data)
    		}
    	)
    	.then((response)=>response.json())
    	.then((response)=>{
    	    //console.log(response.length);
    	    if (response == "" || response == null){
    	        document.getElementById("defaultArrangement").innerHTML = "No bookmarks yet";
    	        return;
    	    }
    	    for (var i=0;i<response.length;i++){
    	        id=response[i]['id'];
        		
        		url=response[i]['url'];
        		name=response[i]['name'];
        		dateCreated=response[i]['date_created'];
        		dateModified=response[i]['date_modified'];
        		/*
        		var s = Site();
        		s.name=name;
        		s.url=url; 
        		s.dateCreated=dateCreated; 
        		s.dateModified=dateModified;
        		s.username=username;
        		//console.log(s);
        		sites.push(s);
        		//console.log(sites)
        		//fetchToDest(site, dest);
        	    */
    	        var deleteSiteString = 'deleteSite(0,\''+name+"', '"+url+"', '"+username+"')";
    	        
    	        var editSiteString = 'openForm(0,\''+name+"', '"+url+"', '"+username+"')";
    	        //console.log(deleteSiteString);
    	        //deleteSiteString="";
    	        var data4 = "<div class='row'><div class='col'><h5><a href='"+url+"' target='_blank'>"+id+". "+name+"</a></h5></div><div class='col' style='overflow:hidden;'><h5 style='color:grey;'>"+url+"</h5></div><div class='col-1'><h5>"+dateCreated+"</h5></div><div class='col-1'><h5>"+dateModified+"</h5></div><div class='col-1'><h5><button type='submit' class='btn btn-outline-secondary' onclick=\""+editSiteString+"\">Edit</button></h5></div><div class='col-1'><h5><button type='submit' class='btn btn-outline-secondary' onclick=\""+deleteSiteString+"\">Delete</button></h5></div></div><br>";
    	        
    	        document.getElementById("defaultArrangement").innerHTML += data4;
    	    
    	    }
    	    countShowAllSite++;
    	    
    	 })
    	 .catch((error)=>{
    	    console.log(error);
    	 });
    	 
    	document.getElementById("refreshSpinner").style.display="none";
        
    	 
    	 
    }

function showAllBook(username){
    
        document.getElementById("bookmarks").style.display="none";
        document.getElementById("books").style.display="block";
        document.getElementById("sortByDateCreatedArrangementDESCB").style.display="none";
        document.getElementById("sortByDateCreatedArrangementASCB").style.display="none";
        document.getElementById("sortByDateModifiedArrangementASCB").style.display="none";
        document.getElementById("sortByDateModifiedArrangementDESCB").style.display="none";
        document.getElementById("searchArrangementB").style.display="none";
        document.getElementById("defaultArrangementB").style.display="block";
        
        document.getElementById("refreshSpinner").style.display="block";
        
        if(countShowAllBook>1){
            //alert("Refreshed");
            $("#refreshSpinner").hide();
            return;
        }
        
        document.getElementById("defaultArrangementB").innerHTML = "";
        
        var showSiteAPIURL = "https://esculapian-gangs.000webhostapp.com/webapp/showBook.php";

        var header={
            'Accept': 'application/json',
            'Content-Type':'application/json'
        };
    
        var Data={
            userid:username
        };
    	var id, url, name, dateCreated, dateModified, page, related_sites;
    	fetch(
    		showSiteAPIURL,{
    			method:'POST',
    			headers:header,
    			body: JSON.stringify(Data)
    		}
    	)
    	.then((response)=>response.json())
    	.then((response)=>{
    	    if (response == "" || response == null){
    	        document.getElementById("defaultArrangementB").innerHTML = "No bookmarks yet";
    	        return;
    	    }
    	    countShowAllBook++;
    	    //console.log(response);
    	    for (var i=0;i<response.length;i++){
    	        id=response[i]['id'];
        		
        		title=response[i]['title'];
        		author=response[i]['author'];
        		dateCreated=response[i]['date_created'];
        		dateModified=response[i]['date_modified'];
        		page=response[i]['page'];
        		related_sites=response[i]['related_sites'];
        		
        		
        		if (related_sites == "" || related_sites == null){
        		    var linkedSite = "No site yet";
                }
                else{
                    //console.log("entering findRelatedSite with"+related_sites);
                    //console.log(typeof(related_sites));
                    findRelatedSite(related_sites, username);
                    var linkedSite = returnString;
                    console.log("findRelatedSite() finished");
                    
                }
                console.log(linkedSite);
    	        var deleteSiteString = 'deleteSite(1,\''+title+"', '"+author+"', '"+username+"')";
    	        if (page == null){
    	            page = 0;
    	        }
    	        
    	        
    	        var editSiteString = 'openFormB(1,\''+title+"', '"+author+"', '"+page+"', '"+related_sites+"', '"+username+"')";
    	        //console.log(deleteSiteString);
    	        //deleteSiteString="";

    	        var data4 = "<div class='row'><div class='col-3' style='overflow:hidden;'><h5>"+title+"</h5></div><div class='col-2' style='overflow:hidden;'><h5 style='color:grey;'>"+author+"</h5></div><div class='col-1'><h5>"+dateCreated+"</h5></div><div class='col-1'><h5>"+dateModified+"</h5></div><div class='col-1'><h5>"+page+"</h5></div><div class='col-2'><h5>"+linkedSite+"</h5></div><div class='col-1'><h5><button type='submit' class='btn btn-outline-secondary' onclick=\""+editSiteString+"\">Edit</button></h5></div><div class='col-1'><h5><button type='submit' class='btn btn-outline-secondary' onclick=\""+deleteSiteString+"\">Delete</button></h5></div></div><br>";
    	        
    	        document.getElementById("defaultArrangementB").innerHTML += data4;
    	    
    	    }
    	    
    	 })
    	 .catch((error)=>{
	        console.log(error);
	     });
	     document.getElementById("refreshSpinner").style.display="none";
        
    	
}

var returnString = "";
function findRelatedSite(idString ,username){
    //returnString = "";
    console.log("entered findRelatedSite() with "+idString +" "+username);
    var showSiteAPIURL = "https://esculapian-gangs.000webhostapp.com/webapp/searchByID.php";

    var header={
        'Accept': 'application/json',
        'Content-Type':'application/json'
    };

    var Data={
        userid:username,
        idlist:idString
    };
    console.log(Data);
	var idOfSite, name, url;
	fetch(
		showSiteAPIURL,{
			method:'POST',
			headers:header,
			body: JSON.stringify(Data)
		}
	)
	.then((response)=>response.json())
	.then((response)=>{
	    console.log(response);
	    for (var i=0;i<response.length;i++){
	        console.log(response);
            idOfSite = response[i]['id'];
	        name=response[i]['name'];
	        url=response[i]['url'];

	        returnString += "<a href='"+url+"' target='_blank'>"+name+"</a> ";
	        //console.log(returnString);

	    }
	    //console.log(returnString);
	    //return returnString;
	 });
	 //console.log(response);
	 console.log(returnString);
}

