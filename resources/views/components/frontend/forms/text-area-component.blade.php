@props(['label', 'name', 'type', 'placeholder' => '', 'id' => '', 'class' => '', 'value' => null, 'spanClass' => ''])
<div class="block lg:flex items-center mb-3">
    <label for="{{ $id }}" class="text-gray-900 w-36 {{ $class }} flex items-center">
        <span>{{ $label }}</span>
        <span class="text-xl {{$spanClass}} ml-1">*</span>
    </label>
    {{-- <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}"
        placeholder="{{ $placeholder }}"
        class=" {{ $class }} px-2 pt-1 pb-2 w-80 md:w-96 border-b-2 focus:border-[#574949] outline-none  bg-white" /> --}}
   <textarea name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder }}" cols="30" rows="5" class="{{ $class }} px-2 pt-1 pb-2 w-80 md:w-96 border-b-2 focus:border-[#333] outline-none  bg-white">{{ $value }}</textarea>
    <span class="text-warning">
        @error('$name')
            {{ $message }}
        @enderror
    </span>
</div>