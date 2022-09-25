<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

  <style type="text/css">
    html {
      box-sizing: border-box;
      height: 100%;
    }

    *,*::before,*::after {
      box-sizing: inherit;
      margin: 0;
      padding: 0;
    }

    .main {
      margin: 0% 25%;
      display: flex;
      flex-direction: column;
      flex-wrap: wrap;
      justify-content: center;
      /* align-items: center; */
      text-align: center;
      gap: 5px 5px; 
      height: 80vh;
    }

    .action {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }
  </style>
</head>

<body>
    <div class="main">
        <h1 style="margin-bottom: 100px;">Kayne West Quote App</h1>
        <div class="action">
            <a href="/api" style="text-decoration: none;">API Endpoint</a>
            <button type="button" class="btn btn-primary" onclick="fetchKanyeQuotes()">Refresh</button>
        </div>
        <div style="margin-top: 50px;">
            <ul class="list-group" id="quotes-list"></ul>
        </div>
    </div>

    <script>
        const api_url = window.location.href + 'api/';
        const listElement = document.getElementById('quotes-list');
        const token = "<?php echo $token ?>";

        //Fetch data after the page is loaded
        window.onload = fetchKanyeQuotes;


        function fetchKanyeQuotes() {
            let fetch_status;
            console.log(token);
            // Create and Send the request
            fetch(api_url, {
                method: "GET",
                headers: {
                    "Authorization": 'Bearer ' + token, // notice the Bearer before your token
                    "Content-type": "application/json;charset=UTF-8",
                }
            })
            .then(function (response) {
                fetch_status = response.status;
                return response.json();
            }) 
            .then(function (json) {
                // Check if the response were success
                if (fetch_status == 200) {
                    // console.log(json);

                    //Update view - List items
                    updateListItems(json);
                }else{
                    alert("Something went wrong!");
                }
            })
            .catch(function (error){
                // Catch errors
                console.log(error);
            }); 
        }


        function updateListItems(json){
            let data = json.data;

            //Removing existing items
            while (listElement.firstChild) {
                listElement.removeChild(listElement.firstChild);
            }

            data.forEach((item, index) => {
                let entry = document.createElement('li');
                entry.classList.add("list-group-item");
                entry.appendChild(document.createTextNode(item));
                listElement.appendChild(entry);
            });
        }
        
    </script>
</body>
<html>