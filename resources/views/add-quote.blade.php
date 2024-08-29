<!DOCTYPE html>
<html>
<head>
    <title>Add Quote</title>
</head>
<body>
    <h1>Add Quote</h1>
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ url('/save') }}" method="post">
        @csrf
        <label for="quote">Quote:</label>
        <input type="text" id="quote" name="quote" value="{{ old('quote') }}" /><br/><br/>
        
        <label for="author">Author:</label>
        <input type="text" id="author" name="author" value="{{ old('author') }}" /><br/><br/>
        
        <label for="language">Language:</label>
        <input type="text" id="language" name="language" value="{{ old('language') }}" /><br/><br/>
        
        <input type="submit" value="Save"/>
    </form>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>
