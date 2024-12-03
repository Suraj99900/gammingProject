// Function to handle the file search
function searchBooks() {
    const keyword = $("#searchBookByNameId").val();

    // Make an AJAX request to the API
    $.ajax({
         url: `https://booksearch.arcom.uz/api/book/search?keyword=${encodeURIComponent(keyword)}`,
        method: 'GET',
        success: function (data) {
            handleSearchSuccess(data);
        },
        error: function (xhr, status, error) {
            handleSearchError(xhr, status, error);
        }
    });
}

function handleSearchSuccess(data) {
    $('#showBookId').html(""); // Clear existing content
    let sTemplate = "";

    if (data.length === 0) {
        sTemplate += `
            <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                <h3 class="text-muted">No Records Found</h3>
            </div>`;
    } else {
        data.forEach((book) => {
            sTemplate += `
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4 px-5" data-bs-theme="dark">
                    <div class="card shadow-sm h-100" style="border-radius: 10px; overflow: hidden;">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h2 class="card-title" title="${book.name}">
                                ${book.name}
                            </h2>
                            
                            <!-- Live Preview Section -->
                            <div class="text-center">
                                <iframe src="https://docs.google.com/viewer?url=${encodeURIComponent(book.url)}&embedded=true" 
                                        style="width:100%; height: 200px; border: none; border-radius: 5px;">
                                </iframe>
                            </div>
                            
                            <!-- Button to View/Download -->
                            <div class="mt-3 text-center">
                                <a href="${book.url}" class="btn btn-primary w-100" style="border-radius: 5px;" target="_blank">
                                    <i class="fas fa-download me-2"></i> View / Download
                                </a>
                            </div>
                        </div>
                        <div class="card-footer bg-dark text-muted text-center" data-bs-theme="dark">
                            <small>File Size: ${book.sizeText || 'Unknown'}</small>
                        </div>
                    </div>
                </div>
            `;
        });
    }

    $('#showBookId').append(`<div class="row gx-3 gy-4">${sTemplate}</div>`);
}


// Function to handle AJAX error
function handleSearchError(xhr, status, error) {
    console.error('Ajax Error:', error);
    const errorMessage = xhr.responseJSON?.message || 'An error occurred during the search.';
    alert(errorMessage);
}

// Initial setup when the document is ready
$(document).ready(() => {
    $('.d-none-custom').css('display', 'none');
    $('#searchBookByNameId').val("genral");
    $('#idSearch').click();
    
});

// Attach the click event handler to the search button
$("#idSearch").on('click',()=>{
    searchBooks();
});