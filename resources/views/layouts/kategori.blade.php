
    <div class="divider text-center">
        <div class="divider-text">
            <h5 class="text-muted fw-bold"> <i class='bx bxs-folder-open'></i> Kategori : </h5>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body p-0">
        <ul class="list-group">
            @foreach ($categories as $category)
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <a href="/categories/{{ $category->slug }}"><i class='bx bxs-folder'></i> {{ $category->name }}</a>
              <span class="badge bg-label-primary">{{ $category->posts->count() }}</span>
            </li>
            @endforeach
            <li class="text-white list-group-item d-flex justify-content-between align-items-center bg-secondary"><a href="/posts/" class="text-white"> <i class='bx bx-grid-small'></i> Lihat Semua Artikel </a>
          </ul>
        </div>
</div>

<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<div class="elfsight-app-dad763b0-8bdc-47bc-85e2-9d78bc625cb2"></div>