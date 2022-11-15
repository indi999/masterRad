<section style="background-color: #ffffff;">
    <div class="container my-5 py-5 text-dark">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-12 col-xl-12">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="text-dark mb-0">Korespondencija (4)</h4>
                    <div class="card">
                        <div class="card-body p-2 d-flex align-items-center">
                            <h6 class="text-primary fw-bold small mb-0 me-1">Comments "ON"</h6>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked />
                                <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- All Comments -->
                @forelse($task->comments as $comment)

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex flex-start align-items-center">
                            <img class="rounded-circle shadow-1-strong me-3"
                                 src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="60"
                                 height="60" />
                            <div>
                                <h6 class="fw-bold text-primary mb-1"></h6>
                                <p class="text-muted small mb-0">
                                   V Team - 22 Jan 2020
                                </p>
                            </div>
                        </div>

                        <p class="mt-3 mb-4 pb-2">
                            {{$comment->body}}
                        </p>
                        <div class="small d-flex justify-content-start">
                            <a href="#!" class="d-flex align-items-center me-3">
                                <i class="fa fa-thumbs-up me-2"></i>
                                <p class="mb-0">Like</p>
                            </a>
                            <a href="#!" class="d-flex align-items-center me-3">
                                <i class="fa fa-comment-dots me-2"></i>
                                <p class="mb-0">Comment</p>
                            </a>
                            <a href="#!" class="d-flex align-items-center me-3">
                                <i class="fa fa-share me-2"></i>
                                <p class="mb-0">Share</p>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse

                <span class="badge badge-primary">Primary</span>
                <span class="badge badge-secondary">Secondary</span>
                <span class="badge badge-success">Success</span>
                <span class="badge badge-danger">Danger</span>
                <span class="badge badge-warning">Warning</span>
                <span class="badge badge-info">Info</span>
                <span class="badge badge-light">Light</span>
                <span class="badge badge-dark">Dark</span>

                <!-- Create new comment -->
                <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">

                    <!-- Succes message -->
                    @if(session('message'))
                        <div class="alert alert-danger">
                            {{session('message')}}
                        </div>
                    @endif
                <!-- Error message from app to git-->
                    @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif

                    <form action="{{route('task.comment.store',['task' => $task->id])}}" method="post" class="">
                        @csrf

                        <div class="d-flex flex-start w-100">
                            <img class="rounded-circle shadow-1-strong me-3"
                                 src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40"
                                 height="40" />
                                <div class="form-outline w-100">
                                     <textarea class="form-control" name="body" id="textAreaExample"
                                                  rows="4" style="background: #fff;"></textarea>
                                     <label class="form-label" for="textAreaExample">Komentar</label>
                                </div>
                        </div>

                        <!-- Upload files -->
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Pridruzi prilog</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>

                        <!-- Submit -->
                        <div class="float-right-end mt-2 pt-1">
                            <button type="submit" class="btn btn-primary btn-sm">Unesi komentar</button>
                            <button type="submit" class="btn btn-outline-primary btn-sm">Odustani</button>
                        </div>
                    </form>
                </div>
                <!-- End Create new comment -->
            </div>
        </div>
    </div>
</section>
