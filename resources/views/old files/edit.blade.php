<x-layout>

    <div class="container mt-6">
        <div class="mt-5" >
            <div class="container d-flex justify-content-center bg-light rounded p-2">
                <h1 class="display-4">Edit your todo</h1>

            </div>
            <div class="container d-flex justify-content-center mt-5">
                <div class="p-5 bg-light rounded col-8">
                    <form action="/todos/{{$task->id}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group mt-3 mb-2">
                            <label for="task" class="mb-1 text-muted"> Edit your todo </label>
                            <input type="text" name="task" id="task" class="form-control-lg mt-2 col-12" style="display:block" value="{{$task->task}}"/>
                        </div>
                        <input style="display:none" type="number" name="id" value="{{$task->id}}">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success mt-3" value="Edit">Submit</button>

                        </div>
                    </form>
                </div>
                <br>
            </div>
        </div>
        <div class="container d-flex justify-content-center mt-3">
            <a href="/todos" class="btn btn-primary mt-3">Back</a>
        </div>

    </div>

</x-layout>
