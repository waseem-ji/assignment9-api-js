<x-layout>
    <section class="vh-100">

    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card" id="list1" style="border-radius: .75rem; background-color: #eff1f2;">
            <div class="card-body py-4 px-4 px-md-5">

              <p class="display-1 text-center mt-3 mb-4 pb-3 text-primary">

                My Todo's
              </p>

              <div class="pb-2">
                <div class="card">
                  <div class="card-body">
                    <div class="">
                        <form action="">
                            {{-- @csrf --}}
                            <div class="d-flex justify-content-space">
                                <input type="text" name="task" id="newTask" class="form-control form-control-lg" id="exampleFormControlInput1"
                                placeholder="Add new...">
                                <a href="#!" data-mdb-toggle="tooltip" title="Set due date"><i
                                    class="fas fa-calendar-alt fa-lg me-3"></i></a>
                                    <div>
                                        {{-- <button type="submit" class="btn btn-primary" >Add</button> --}}
                                        <button class="btn btn-primary" onclick="addTask()" >Add</button>
                                    </div>

                                </div>
                                <div class="d-flex justify-content-center">

                                        <x-alert />

                                </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>

              <hr class="my-4">


              <div id="outer-task-box">

              </div>
             




            </div>
          </div>
        </div>
      </div>
    </div>
 <!-- Button trigger modal -->


  </section>





</x-layout>
