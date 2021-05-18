

function x(br){
    button=window.event.target;
    parent=button.parentElement;
    forma=parent.getElementsByTagName('form')[0];

    let f=document.getElementById("forma"+br);
    
    p=f[0].value;
    g=f[0].defaultValue;
    ff=new FormData(f);
}

//This functions creates elements that are common for all creations
//return - a JSON object that contains all the common elements that a specificCreate function will use to append specific elements 
function commonCreate(){
    //the row of the page container
    divPageRow=document.getElementsByClassName('row')[0];
    
    //one specific container
    divContainer=document.createElement('div');
    divContainer.classList.add(['col-11', 'col-md-5', 'order-1', 'result-container'])
    
    //row for the specific container - the specific class (trip/group/wish...) will have to be added by the specificCreate function
    divContainerRow=document.createElement('div');
    divContainerRow.classList.add('row');
    
    //the div that will contain the image
    div1=document.createElement('div');
    div1.classList.add('col-3');

    //the div that will contain the body
    div2=document.createElement('div');
    div2.classList.add('col-6');

    //the div that will contain the buttons and the hidden form
    div3=document.createElement('div');
    div3.classList.add('col-3');

    return {'divPageRow':divPageRow,
            'divContainer':divContainer,
            'divContainerRow':divContainerRow,
            'div1':div1,
            'div2':div2,
            'div3':div3
        };
    
}
//the argument to the function is an object returned by commonCreate() after specificCreate appended specific elements
//this functions adds the object to the page 
function addToPage(commonCreateObj){
    commonCreateObj['divContainerRow'].appendChild(commonCreateObj['div1']);
    commonCreateObj['divContainerRow'].appendChild(commonCreateObj['div2']);
    commonCreateObj['divContainerRow'].appendChild(commonCreateObj['div3']);
    commonCreateObj['divContainer'].appendChild(commonCreateObj['divContainerRow']);
    commonCreateObj['divPageRow'].appendChild(commonCreateObj['divPageRow']);
}


{/* <div class="col-11 col-md-5 order-1 result-container">
                        <div class="row trip">
                            <div class="col-3">
                                <img class="slika" src="php/images/1620843858relayfinal.png">
                            </div>
                            <div class="col-6">
                                    <p>Belgrade</p>
                                    <p> 12/6/2021</p>
                                    <p> 20/6/2021</p>
                                    <p>Budget: $500</p>
                                    <p>members: 4</p>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-success" onclick="x(1)">Request</button>
                                    <form action="#" id="forma1">
                                        <input type="text" name="outgoing_id" value="16"hidden>
                                        
                                        <!-- ovo treba da bude groupID -->
                                        <input type="text" name="incoming_id" value="121"hidden>
                            
                        
                                    </form>
                            </div>
                        </div>
                    </div> */}

//this is a specific create for a Group that is returned by the matching engine
function appendGroup(element,image,where,from,to,budget,members,groupid,userid){

}