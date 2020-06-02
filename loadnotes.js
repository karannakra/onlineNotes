$(function(){
    $.ajax({
        url:"getusrname.php",
        success:function (data) {
            $("#loginname").html("logged in as "+data);
        },
        error:function () {
            console.log("error")
        }
    });
    //define varibale for using them later
    var activeNote=0;
    var editMode=false;
    //load notes on page load:AJAX call to loadnotes.php
    $.ajax({
        url:"loadnotes.php",
        success:function (data) {
            $("#notes").html(data);
            clickOnNote();
            clickOndelete();
        },
        error:function () {
            $("#alert-content").text("there was an issue with the loadnotes call");
            $("#alert").fadeIn();
        }
    });
    //add a new note:
    $("#AddNote").click(function () {
        $.ajax({
            //ajax call to createnote.php
            url:"createnotes.php",
            success:function (data) {
                if(data=='error'){
                    $("#alert-content").text("there was an issue with inserting the notes in the database");
                    $("#alert").fadeIn();
                }else {
                    //update that variable that is active note
                    activeNote=data;
                    $("textarea").val("");
                    showHide(["#notePad","#AllNotes"],["#notes","#AddNote","#Edit","#Done"]);
                    //show hide elements
                    $("textarea").focus();

                }

            },
            error:function () {
                $("#alert-content").text("there was an issue with ajax call to createnote");
                $("#alert").fadeIn();
            },
        })
    });
    //typing a note:ajax call to file update note.php
    $("textarea").keyup(function () {$.ajax({
        url:"updatenotes.php",
        type:"POST",
        //we need to send the current note content with its id to that php file
        data:{note:$(this).val(),id:activeNote},
        success:function (datareturned) {
            if(datareturned=='error'){
                $("#alert-content").text("there was an issue updating the note in the database");
                $("#alert").fadeIn();
            }
        },
        error:function () {
            $("#alert-content").text("there was an issue with the update call in textarea");
            $("#alert").fadeIn();

        }
    });
        //ajax call will be sent to the update file
    });
    //clicking on all notes button
    $("#AllNotes").click(function () {
        $.ajax({
            url:"loadnotes.php",
            success:function (data) {
                $("#notes").html(data);
                showHide(["#notes","#AddNote","#Edit"],["#notePad","#AllNotes","#Done"]);
                clickOnNote();
                clickOndelete();
            },
            error:function () {
                $("#alert-content").text("there was an issue with the loadnotes call");
                $("#alert").fadeIn();

            }
        });
    });
    //click on the done button after editing
    $("#Done").click(function () {
        //switch to non edit mode
        editMode=false;
        $(".noteheader").removeClass("col-lg-9 offset-lg-3 col-8 offset-4");
        showHide(["#Edit",],[this,".delete"]);
        $(".noteheader").css({"position":"relative","top":"0"});
    });
    //click on edit: go to edit  mode(show delete button,..)
    $("#Edit").click(function (){
        // switch to edit mode
        editMode=true;
        // reduce the width of notes
        $(".noteheader").addClass("col-lg-9 offset-lg-3 col-8 offset-4");
        $(".noteheader").css({"position":"relative","top":"-25px"});
        $(".delete").css({"position":"relative","top":"25px"});
        // //show hide function
        showHide(["#Done",".delete"],["#Edit"]);
    });





    //functions
    //array1 have all the ids of the element that we need to show
    //array2 have all the ids of the element that we need to hide
    function showHide(array1,array2) {
        for(i=0;i<array1.length;i++){
            $(array1[i]).show();
        }
        for(i=0;i<array2.length;i++){
            $(array2[i]).hide();
        }
    }
    //click on a note
    function clickOnNote(){
        $(".noteheader").click(function () {
            if(!editMode){
                //update active note
                activeNote=$(this).attr("id");
                //fill text area
                $("textarea").val($(this).find(".text").text());
                showHide(["#notePad","#AllNotes"],["#notes","#AddNote","#Edit","#Done"]);
                $("textarea").focus();
            }
        });

    }

    //click on delete
    function clickOndelete() {
        $(".delete").click(function () {
            var deleteButton=$(this);
            $.ajax({
                url:"deletenotes.php",
                type:"POST",
                data: {id:deleteButton.next().attr("id")},
                success:function (data) {
                    if(data=="error"){
                        $("#alert-content").text("there was an error deleting the data base");
                        $("#alert").fadeIn();
                    }
                    else {
                        deleteButton.parent().remove();


                    }

                },
                error:function () {
                    $("#alert-content").text("there was an error deleting the data base akax cal");
                    $("#alert").fadeIn();
                }

            })
        });

    }
});