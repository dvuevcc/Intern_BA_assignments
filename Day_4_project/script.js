$(document).ready(function () {

    // data structure declare to store the values

    const dataArray = [];

    //updating array on dynamic changes

    function updateDataArray() {
        // Clear the dataArray
        dataArray.length = 0;

        // Iterate over each row and update dataArray
        $("#nominee-table-body tr").each(function () {
            var row = $(this);
            var rowData = {
                name: row.find(".name_nominee").val(),
                relation: row.find(".relation_nominee").val(),
                nid_birth: row.find(".nid_birth").val(),
                mobile: row.find(".mobile_nominee").val()
            };
            dataArray.push(rowData);
        });

        console.log(dataArray);
    }

    // row remove 
    
    $("#nominee-table-body").on("click", ".btn-remove", function () {
        $(this).closest("tr").remove();
        updateDataArray();
    });

    //row add

    $("#row_add").click(function () {
        var newRow = '<tr>' +
            '<td><input class="form-control name_nominee" type="text" name="name_nominee"></td>' +
            '<td>' +
            '<select class="form-control relation_nominee" name="relation_nominee" aria-placeholder="Select">' +
            '<option value="" disabled selected>Select</option>' +
            '<option value="son">Son</option>' +
            '<option value="daughter">Daughter</option>' +
            '<option value="husband">Husband</option>' +
            '<option value="wife">Wife</option>' +
            '<option value="father">Father</option>' +
            '<option value="mother">Mother</option>' +
            '<option value="brother">Brother</option>' +
            '<option value="sister">Sister</option>' +
            '</select>' +
            '</td>' +
            '<td>' +
            '<input class="form-control nid_birth" type="text" name="nid_birth" placeholder="Enter 10 digit Number">' +
            '<div class="form-check form-check-inline">' +
            '<input class="form-check-input" type="radio" id="nid' + dataArray.length + '" name="nid_birth' + dataArray.length + '" value="nid" checked required>' +
            '<label class="form-check-label" for="nid">NID</label>' +
            '</div>' +
            '<div class="form-check form-check-inline">' +
            '<input class="form-check-input" type="radio" id="birth' + dataArray.length + '" name="nid_birth' + dataArray.length + '" value="birth" required>' +
            '<label class="form-check-label" for="birth">Birth certificate</label>' +
            '</div>' +
            '</td>' +
            '<td>' +
            '<input class="form-control mobile_nominee" type="tel" name="mobile_nominee" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-danger btn-remove"><i class="fa fa-times" aria-hidden="true"></i></button>' +
            '</td>' +
            '</tr>';

        $("#nominee-table-body").append(newRow);
    });

    //nid_birth field placeholder change when click 

    $("#nominee-table-body").on("change", "input[name^='nid_birth']", function () {
        var placeholderText = $(this).val() === "nid" ? "Enter 10 digit Number" : "Enter 17 digit Number";
        $(this).closest("td").find(".nid_birth").attr("placeholder", placeholderText);
        if ($(this).val() === "birth") {
            $(this).closest("td").find(".nid_birth").val(""); 
        }
    });

    $("#nominee-table-body").on("input", ".form-control", function () {
        updateDataArray();
    });

    // database storing...
    // $("#nominee-table-body").on("focusout", ".form-control", function () {
    //     saveDataToDatabase();
    // });

    // function saveDataToDatabase() {
    //     $.ajax({
    //         type: "POST",
    //         url: "connect.php",
    //         data: { data: dataArray },
    //         success: function (response) {
    //             console.log(response); // Log the response from the server
    //             // Optionally, you can clear the table or perform other actions
    //         },
    //         error: function (xhr, status, error) {
    //             console.error("Error: " + error); // Log any errors that occur
    //         }
    //     });
    // }


});
