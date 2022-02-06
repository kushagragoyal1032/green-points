// <!-- Rejection of Task -->

reject = document.getElementsByClassName('rejectbtn');
Array.from(reject).forEach((element) => {
    element.addEventListener("click", (e) => {
        Reject_Task_id.value = e.target.id;
        // console.log(taskid);
        // hiddenid.value = taskid;
        // if (confirm("Are You Sure to want to Reject this Task")) {
        //     window.location = `partner_previous_history.php?P_reject=${taskid}`;
        // } else {
        //     console.log("NO");
        // }
    })
})



// <!-- Completion of Task -->

MarkCompleteBtn = document.getElementsByClassName('completebtn');
Array.from(MarkCompleteBtn).forEach((element) => {
    element.addEventListener("click", (e) => {
        // console.log("editbtn", );
        // tr= e.target.parentNode.parentNode;
        // title_sc = tr.getElementsByTagName("td")[0].innerText;
        // description_sc = tr.getElementsByTagName("td")[1].innerText;
        // console.log(title_sc, description_sc);
        // edit_title.value = title_sc;
        // edit_desc.value = description_sc;

        Task_id.value = e.target.id; //here it taking the id of button of completed and putting in into the hidden input of modal
        // $("#CompletedModal").modal('data-toggle');
    })
})
