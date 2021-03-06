<div>
    <form wire:submit.prevent="{{$action}}"  x-init="myAlert()">

        <div class="form-group col-span-6 sm:col-span-5" wire:ignore>
            <label for="detail">{{__('Masukkan Soal')}}</label>
            <div class="col-sm-12 col-md-12" >
                <textarea type="text" input="description" id="summernote" class="form-control summernote" required>
                    {{$question['quest']}}
                    </textarea>
            </div>
        </div>

        <div class="form-group col-span-6 sm:col-span-5" wire:ignore>
            <label for="detail">{{__('a')}}</label>
            <div class="col-sm-12 col-md-12" >
                <textarea type="text" input="description" id="summernote1" class="form-control summernote" required>
                    {{$question['a']}}
                    </textarea>
            </div>
        </div>

        <div class="form-group col-span-6 sm:col-span-5" wire:ignore>
            <label for="detail">{{__('b')}}</label>
            <div class="col-sm-12 col-md-12" >
                <textarea type="text" input="description" id="summernote2" class="form-control summernote" required>
                    {{$question['b']}}
                    </textarea>
            </div>
        </div>

        <div class="form-group col-span-6 sm:col-span-5" wire:ignore>
            <label for="detail">{{__('c')}}</label>
            <div class="col-sm-12 col-md-12" >
                <textarea type="text" input="description" id="summernote3" class="form-control summernote" required>
                    {{$question['c']}}
                    </textarea>
            </div>
        </div>

        <div class="form-group col-span-6 sm:col-span-5" wire:ignore>
            <label for="detail">{{__('d')}}</label>
            <div class="col-sm-12 col-md-12" >
                <textarea type="text" input="description" id="summernote4" class="form-control summernote" required>
                    {{$question['d']}}
                    </textarea>
            </div>
        </div>

        <div class="form-group col-span-6 sm:col-span-5" wire:ignore>
            <label for="detail">{{__('e')}}</label>
            <div class="col-sm-12 col-md-12" >
                <textarea type="text" input="description" id="summernote5" class="form-control summernote" required>
                    {{$question['e']}}
                    </textarea>
            </div>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Jawaban Benar')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="question.value" required/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('redirect',function (){
{{--                window.location = "{{route('admin.question-detail.index')}}";--}}
            });
        });
    </script>
    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('redirect', () => {
                setTimeout(function () {
{{--                    window.location.href = "{{route('admin.question-detail.create')}}"; //will redirect to your blog page (an ex: blog.html)--}}
                }, 2000); //will call the function after 2 secs.
            });
        });
    </script>
    <script type="text/javascript">
        function Datepicker() {
            $('#datetimepicker').datetimepicker({
                format: 'YYYY-MM-DD H:mm'
            }).on("dp.change", function (e) {
            @this.set('pay_date', e.date);
            });
        };
        window.addEventListener('turbolinks:load', Datepicker);
    </script>
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {
            $('#summernote').summernote({
                placeholder: 'Hello stand alone ui',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {

                    onChange: function (contents, $editable) {
                    @this.set('question.quest', contents)
                    }
                }

            })
            $('#summernote1').summernote({

                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {

                    onChange: function (contents, $editable) {
                        // console.log('asdasd')
                    @this.set('question.a', contents)
                    }
                }
            })
            $('#summernote2').summernote({

                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {

                    onChange: function (contents, $editable) {
                    @this.set('question.b', contents)
                    }
                }
            })
            $('#summernote3').summernote({

                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {

                    onChange: function (contents, $editable) {
                    @this.set('question.c', contents)
                    }
                }
            })
            $('#summernote4').summernote({

                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {

                    onChange: function (contents, $editable) {
                    @this.set('question.d', contents)
                    }
                }
            })
            $('#summernote5').summernote({

                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {

                    onChange: function (contents, $editable) {
                    @this.set('question.e', contents)
                    }
                }
            })
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('button[data-event="showImageDialog"]').attr('data-toggle', 'image').removeAttr('data-event');
        });
    </script>
</div>


