<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    
    <div class="container">
        <div id="info" class="row">
            <div class="col-12">
                <span id="demo1"></span>
                <hr>
                <span id="demo2"></span>
            </div>
        </div>

           <div id="main"> <table class="table">
                <h1>Posts</h1>
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Body</th>
                    </tr>
                </thead>
                <tbody id="tblData">

                </tbody>
            </table>
        </div>
    </div>
   

    <script>
        function btninfo_click(id){ //กดปุ่มแล้วทำข้างใน
            //alert(id);
            $("#info").show();
            $("#main").hide();

            var url ="https://jsonplaceholder.typicode.com/posts/"+id;
              $.getJSON(url)
                .done((data)=>{
                   $("#demo1").text( JSON.stringify(data));
                
                     var url2 ="https://jsonplaceholder.typicode.com/posts/"+id+"/comments";
                     $.getJSON(url2)
                        .done((data)=>{
                            $("#demo2").text(JSON.stringify(data));

                            
                        })
                        .fail((xhr,status,error)=>{

                        });
                })

        }
        function loadJSONObject(){
            var url = "https://jsonplaceholder.typicode.com/posts/?fbclid=IwAR0MWyNnfx6LrtwoskTDgU3W2Y5g0HOx2xWV9qdq4ukiWsuPIpGNSNjTKbU";
             
            $.getJSON(url)
                .done((data)=>{
                    console.log(data)
                    $.each(data,(k,item)=>{        //loop
                        console.log(data)
                        var line = "<tr>"
                            +"<td><button onClick= 'btninfo_click("+ item.id+")' class = 'btn-sm btn-primary'>i</button></td>"  //ปุ่ม
                            +"<td>"+ item.id + "</td>"
                            +"<td>"+ item.title + "</td>"
                            +"<td>"+ item.body + "</td>"
                            +"</tr>";
                        $("#tblData").append(line);
                        })
                })
                .fail((xhr, status, err)=>{
                    console.log("error")
                })
        }
        $(()=>{
            loadJSONObject();
            $("#info").hide();
        });
    </script>
</body>
</html>