@extends('admin.admin_dashboard') @section('admin')
<div class="page-content">
    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Reply Comment</h6>

                        <form method="post" action="{{ route('reply.comment') }}" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $comment->id }}">
                            <input type="hidden" name="user_id" value="{{ $comment->user->id }}">
                            <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
                            <div class="mb-3">
                                <label for="state_name" class="form-label">User Name:</label>
                                <code>{{ $comment->user->name??'' }}</code>
                            </div>
                            <div class="mb-3">
                                <label for="state_name" class="form-label">Post Title:</label>
                                <code>{{ $comment->post->post_title??'' }}</code>
                            </div>
                            <div class="mb-3">
                                <label for="state_name" class="form-label">Subject:</label>
                                <code>{{ $comment->subject??'' }}</code>
                            </div>
                            <div class="mb-3">
                                <label for="state_name" class="form-label">Message:</label>
                                <code>{{ $comment->message??'' }}</code>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control id="subject" name="subject" autocomplete="off"/>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <input type="text" class="form-control id="message" name="message" autocomplete="off"/>
                            </div>
                            
                            
                            <button type="submit" class="btn btn-primary me-2">Reply</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- middle wrapper end -->
        <!-- right wrapper start -->

        <!-- right wrapper end -->
    </div>
</div>

@endsection
