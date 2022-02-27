<div class="row">
    <div class="col-md-12">
        <form class="row g-3" method="POST" action="@yield('action')" enctype="multipart/form-data">
            @csrf
            @yield('form-input')
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Submit</button>
            </div>
        </form>
    </div>
</div>
