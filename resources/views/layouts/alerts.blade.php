            @if (session('status'))
            <div class="alert alert-alt alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-alt alert-danger">
                <span class="alert-icon-margin wb-alert-circle"></span> {{ session('error') }}
            </div>
            @endif
            @if (session('warning'))
            <div class="alert alert-alt alert-warning">
                {{ session('warning') }}
            </div>
            @endif
            @if (session('info'))
            <div class="alert alert-alt alert-info">
                {{ session('info') }}
            </div>
            @endif