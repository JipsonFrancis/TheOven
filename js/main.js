// development get is disabled
// developmetn css api is disabled at page.css

$(document).ready(()=>{
    let T = $('.T')
    let preloader = new TimelineMax({repeat:-1});


 
    preloader
        .staggerFromTo(T, 1,
            {y:20, autoAlpha:0},
            {y:20, autoAlpha:1},
            0.5
            )
        .staggerTo(T, 1,
            {y:20, autoAlpha:0}, 0.5
            )

        
    

    $.get(
        "https://www.googleapis.com/youtube/v3/channels",{
         part: "contentDetails",
         id: "UCAfMyVkIJmnoMBRs7VegDYA",
        key: 'AIzaSyDqQXObTgGe2pZxCBafmRPSF1cSmkSfK28'},
        function(data) {
            console.log(data);
            
         // try {
         //     console.log("prince");
             
         //     $.each( data.items, function(item) {
         //     console.log("prince");
         //       pid = item.contentDetails.relatedPlaylists.uploads;
         //       getVids(pid);
         //   });
             
         // } catch (error) {
         //     console.log(error);
             
         // }

           $.each( data.items, function( i, item ) {
             console.log("prince");
               pid = item.contentDetails.relatedPlaylists.uploads;
               getVids(pid);
           });
       }
     ).fail((jqXHR)=>{
       
        $(".videoTitle").text('failed to load ... ' + jqXHR.status + jqXHR.responseText)
        console.log("failed");
        $(".close").click()
        
     })
    
     //Get Videos
     function getVids(pid){
         $.get(
             "https://www.googleapis.com/youtube/v3/playlistItems",{
             part : 'snippet', 
             maxResults : 20,
             playlistId : pid,
             key: 'AIzaSyDqQXObTgGe2pZxCBafmRPSF1cSmkSfK28'},
             function(data) {
                 let results;
                 let latest = true;
                 $.each( data.items, function( i, item ) {
                     console.log(item.snippet.thumbnails);
                    // <button type="button" class="btn btn-circle btn-warning"><i class="fa fa-play"></i></button>
                     //results = '<li>'+ item.snippet.resourceId.videoId+'</li>';
                     results = `<img src="${item.snippet.thumbnails.default.url}" alt="">
                     <a class="" href="https://www.youtube.com/${item.snippet.resourceId.videoId}" data-provide="lightbox">${item.snippet.title}</a>
                     `
                     $('.morevids').append(results)


                    if(latest){
                     $("#nowPlaying")[0].href = `https://www.youtube.com/${item.snippet.resourceId.videoId}`
                        latest = false
                    }
                    $(".close").click()
                 });
             }
         );
         console.log("UI HEXED");
         
     }


  

})

