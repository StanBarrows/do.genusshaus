<footer class="footer mt-5">
    <div class="container">
        <span class="text-muted">&copy; {{ \Carbon\Carbon::now()->year }} - <a target="_blank"
                                                                               href="https://www.smartgate.ch">smartgate AG</a> - Genusshaus v1.0.2rbc</span>


        @if(!Auth::guest())
            <div class="float-right">
                <a href="{{ route('users.support.index') }}" class=""><strong><i style="color: #4ca0f5"
                                                                                 class="fas fa-question-circle fa-lg"></i></strong>
                    Support</a>
            </div>

        @endif

    </div>
</footer>