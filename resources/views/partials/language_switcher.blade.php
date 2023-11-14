<form action="{{route('language.switch')}}" method="POST" class="inline-block">
    @csrf
    <select name="language" onchange="this.form.submit()" class="btn-secondary p-2 rounded bg-gray-100 text-gray-100">
        <option value="en" {{app()->getLocale()==='en' ? 'selected': ''}}>English</option>
        <option value="ar" {{app()->getLocale()==='ar' ? 'selected': ''}}>عربي</option>
    </select>
</form>


