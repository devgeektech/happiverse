
    <div class="card business-single-card">
        <div class="card-img">
            @if(!empty($group->groupImageUrl))
            <img src="{{'http://127.0.0.1:8000/'.$group->groupImageUrl}}" alt="" class="card-img">
            @else
            <img src="" alt="" class="card-img">
            @endif
            <!-- <form class="edit-phto">
                <i class="fa fa-camera-retro"></i>
                <label class="fileContainer">
                    Edit Cover Photo
                <input type="file" />
                </label>
            </form> -->
        </div>
        <div class="card-body">
            
            <!-- <div class="d-flex justify-content-center">
                <div class="user-img online">
                    <img src="https://images.unsplash.com/photo-1577880216142-8549e9488dad?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" alt="" class="user-img">
                </div>
            </div> -->
            <h3 class="card-title">{{$group->groupName}}</h3>
           
            <!-- <ul class="list-icons-s1">
                <li class="list-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>New york, United States</p>
                </li>
                <li class="list-item">
                    <i class="fas fa-phone-alt"></i>
                    <p>+82 12983 890 909</p>
                </li>
                <li class="list-item">
                    <i class="fas fa-list-ul"></i>
                    <p>Dancing Club</p>
                </li>
            </ul> -->
            <ul class="nav nav-tabs nav-tabs-s2 gap-2 border-0 mt-4 mb-0 justify-content-center justify-content-md-start"
            id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="timeline-tab" data-bs-toggle="tab"
                    data-bs-target="#timeline-tab-pane" type="button" role="tab"
                    aria-controls="timeline-tab-pane" aria-selected="true"><i
                        class="fas fa-window-restore me-2"></i>Timeline</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="photos-tab" data-bs-toggle="tab"
                    data-bs-target="#photos-tab-pane" type="button" role="tab"
                    aria-controls="photos-tab-pane" aria-selected="true"><i
                        class="fas fa-camera-retro me-2"></i>Photos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="business-tab" data-bs-toggle="tab"
                    data-bs-target="#videos-tab-pane" type="button" role="tab"
                    aria-controls="videos-tab-pane" aria-selected="false" tabindex="-1"><i
                        class="fas fa-video me-2"></i>Videos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="friends-tab" data-bs-toggle="tab"
                    data-bs-target="#friends-tab-pane" type="button" role="tab"
                    aria-controls="friends-tab-pane" aria-selected="false" tabindex="-1"><i
                        class="fas fa-user-friends me-2"></i>Group Members</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="groups-tab" data-bs-toggle="tab"
                    data-bs-target="#groups-tab-pane" type="button" role="tab"
                    aria-controls="groups-tab-pane" aria-selected="false" tabindex="-1"><i
                        class="fas fa-users me-2"></i>Topics</button>
            </li>
            
        </ul>
        </div>
    </div>
<!-- top area -->


