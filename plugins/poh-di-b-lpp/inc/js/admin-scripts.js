document.addEventListener('DOMContentLoaded', function() {
    let header = document.querySelector('#start');
    openTab('Tab1', header);
})

function openTab(tabId, elmnt) {
    // Hide all tab content elements
    var tabcontent = document.getElementsByClassName("tabcontent");
    for (var i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Remove the "active" class from all tab links
    var tablinks = document.getElementsByClassName("tablink");
    for (var i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab content element and add the "active" class to the current tab link
    document.getElementById(tabId).style.display = "block";
    elmnt.className += " active";
}

