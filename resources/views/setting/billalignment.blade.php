<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.css">
<x-app-layout>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <div class="leftsidebar">

            @include('layouts.leftsidebar')
        </div>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('layouts.mainnavbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="row">
                        @foreach ($agreementpages as $agreementpage)
                        <div class="card" style="width: 18rem;">
                            <!-- <img src="..." class="card-img-top" alt="..."> -->
                            <div class="card-body">
                                <h5 class="card-title">Page Number{{ $agreementpage->page_number }}</h5>
                                <a href="/setting/agreementpage/{{ $agreementpage->id }}" class="btn btn-primary">Edit Page</a>

                                    <button type="button" onclick="deleteAgreementPage({{ $agreementpage->id }})" class="btn btn-danger">Delete</button>
                               
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>

    <!-- modal section  -->
    <!-- Modal -->

</x-app-layout>


<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/javascript/javascript.min.js"></script>

<script>
    function deleteAgreementPage(id) {
        if (!confirm('Are you sure you want to delete this page?')) return;
        const url = `{{ url('/setting/agreementpage') }}/${id}`;
        fetch(url, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(async response => {
            const data = await response.json().catch(() => ({ success: false, message: 'Unexpected response' }));
            if (response.ok && data.success) {
                // Show transient success without full reload for better UX
                const alert = document.createElement('div');
                alert.className = 'alert alert-success';
                alert.innerText = data.message || 'Deleted.';
                document.querySelector('.content-wrapper').prepend(alert);
                // Remove the card from DOM
                const btn = document.querySelector(`button[onclick="deleteAgreementPage(${id})"]`);
                if (btn) {
                    const card = btn.closest('.card');
                    if (card) card.remove();
                }
                setTimeout(() => alert.remove(), 4000);
            } else {
                alert(data.message || 'Failed to delete the page. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    }
</script>
