@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>{{ __('TaskList')}}</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ __('Error')}}</li>
            @endforeach
        </ul>
    </div>
@endif