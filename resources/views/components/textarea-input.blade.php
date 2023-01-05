@props(['name'])

<textarea 
    class="rounded-md shadow-sm border-slate-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
    type="text" 
    id="{{$name}}" 
    name="{{$name}}"  
    value="{{ old('$name') }}"
    required>
{{$slot}}
</textarea>
