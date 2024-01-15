let selectedId;
let articleId;
function setArticleId(id) {
    sessionStorage.setItem('selectedId',id);
}
articleId = sessionStorage.getItem('selectedId');
alert(articleId);

var xhr = new XMLHttpRequest();

// Specify the PHP file to send the request to and the request method (POST)
xhr.open("POST", "article_page.php", true);

// Set the request header to inform the server about the data type being sent (form data)
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

// Define a callback function for when the request is complete
xhr.onreadystatechange = function () {
  // If the request is complete and the response status is 200 (OK)
  if (xhr.readyState == 4 && xhr.status == 200) {
    // Handle the response from the server here
    console.log(xhr.responseText);
  }
};

// Send the JavaScript variable as a parameter to the server
xhr.send("articleId=" + articleId);