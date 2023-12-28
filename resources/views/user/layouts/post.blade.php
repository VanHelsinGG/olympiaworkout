<div class="row my-5 p-4 rounded shadow-sm bg-variant-2 post" id="{{ $post->id }}">
    <div class="col">
        <div class="row">
            <div class="col-1 d-md-block d-none">
                <img src='{{ url($post->author->image()) }}' class="img-fluid rounded-circle bg-dark h-100 w-100">
            </div>
            <div class="col-11">
                <div class="row">
                    <div class="col-11">
                        <span> {{ $post->author->name }} </span>
                    </div>
                    <div class="col-1">
                        <!-- Botão de açáo dos dots -->
                        <div class="dropdown">
                            <a href="#" class="btn" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical fs-4"></i>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @if($user->permissions->isModerator() || $post->user === $user->id)
                                <li><button class="dropdown-item post-delete-button"><i class="bi bi-backspace-reverse-fill me-2"></i>Excluir</button></li>
                                @endif

                                @if($post->user === $user->id)
                                <li><button class="dropdown-item post-edit-button"><i class="bi bi-pen-fill me-2"></i>Editar</button></li>
                                @endif
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li><button class="dropdown-item post-report-button"><i class="bi bi-dash-circle-fill me-2"></i>Denunciar</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:-1.6rem;">
                    <div class="col-12"><small class="text-secondary"> {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y')  }} @if($post->created_at != $post->updated_at) - Editado @endif</small></div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="h-100 w-100 p-2">
                <span id="content" class="text-break">{{ $post->content }}</span>
            </div>
        </div>
        <div class="col action-btn-group">
            <button type="button" class="btn rounded-5 btn-blue text-white me-3 shadow post-like-button">
                <i class="bi @if($user->posts_reactions->where('post', $post->id)->where('reaction_type', 'like')->count() > 0) bi-hand-thumbs-up-fill @else bi-hand-thumbs-up @endif text-white me-2"></i>
                <span>{{ $post->reactions()->where('reaction_type', 'like')->count() }}</span>
            </button>
            <button type="button" class="btn rounded-5 btn-red shadow text-white post-dislike-button">
                <i class="bi @if($user->posts_reactions->where('post', $post->id)->where('reaction_type', 'dislike')->count() > 0) bi-hand-thumbs-down-fill @else bi-hand-thumbs-down @endif text-white me-2"></i>
                <span>{{ $post->reactions()->where('reaction_type', 'dislike')->count() }}</span>
            </button>
        </div>
    </div>
    @csrf
</div>