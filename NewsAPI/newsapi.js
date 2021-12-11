$(document).ready(function(){
    
    $("#submit").on("click",function(e){
         e.preventDefault();
         let topic = input.value;

         let url = `http://www.phpdemo.com/api.php?q=${topic}`;

         if (input.value !== ""){
            $.ajax({
               
                url: url,
                method: "GET",
                dataType: "json",

                success: function(news){
                    
                    var data = JSON.parse(news);
                    
                    let output = "";
                    let latestNews = data.articles;
                    
                    for(var i in latestNews){
                        output +=`
                           <h4>${latestNews[i].title}</h4>
                           <img src="${latestNews[i].urlToImage}">
                           <p><b>Description:</b> ${latestNews[i].description}</p>
                           <p><b>Content:</b> ${latestNews[i].content}</p>
                           <p><b>Published on:</b> ${latestNews[i].publishedAt}</p>
                        `;
                    }
                    if(output != ""){

                        $("#newsResults").html(output);

                    }else{
                        let NewsnotFound = "There is no news available for your input";
                        $("#newsResults").html(NewsnotFound);
                    }
                },

                error: function(){
                    console.log("error");
                }


            });
         }else{
             console.log("Input field is empty!");
         }

    });

});