<div class="center-block">
  <div class="text-center">
    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar rounded-circle img-circle img-thumbnail" alt="avatar">
  </div>
    <p class="text-center">
      @isset($user->name)
        {{ $user->name }}
      @else
        ID : {{ $user->id }}
      @endif
      のページです。
    </p>
</div>