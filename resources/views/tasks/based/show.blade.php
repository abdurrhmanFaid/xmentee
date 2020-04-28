@extends('layouts.app')

@section('title')
    {{$task->title}}
@endsection

@section('content')
    @if(! auth()->user()->isStudent())
        <instructor-task-page inline-template :batches="{{$band->batches}}">
            <div>
                <div class="section-body">
                    <div class="container mt-10">
                        <div class="card">
                            <div class="card-header">
                                Task
                            </div>
                            <div class="card-body">
                                <h5>{{$task->title}}</h5>
                                <p>{{$task->body}}</p>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="section-body">
                    <div class="container mb-10">
                        <h3>Select batch</h3>
                        <div class="row mt-2">
                            <div
                                class="col-lg-3 col-md-6"
                                v-for="batch in batches"
                                :key="batch.slug"
                                @click="selectedBatch=batch">
                                <div class="card" :class="selectedBatch && selectedBatch.id == batch.id ? 'selected-batch' : ''">
                                    <div class="card-body text-center">
                                        <h6 v-text="batch.name"></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-body" v-if="selectedBatch">
                    <div class="container">
                        <div class="row mb-20" v-if="selectedItems.length">
                            <div class="col-md-12">
                                <button class="float-right btn btn-outline-danger" @click.prevent="assign">Done</button>
                            </div>
                        </div>
                        <div class="row">
                            <template v-if="!loading">
                                <div :class="selectedItems.length ? 'col-md-4' : 'col-md-6'">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                @{{ selectedBatch.name }} Students
                                            </h3>
                                            <div class="card-options">
                                                <button class="btn btn-default btn-sm mr-2" @click="selectAll(students, 'student')">
                                                    Select all
                                                </button>
                                                <button class="btn btn-danger btn-sm" @click="removeAll(students)">
                                                    Unselect all
                                                </button>
                                            </div>
                                        </div>
                                        <table class="table card-table mt-2" v-if="students.length">
                                            <tbody>
                                            <tr v-for="student in students" :key="student.id" :class="hasSelected(student, 'student') ? 'selected-item' : ''">
                                                <td class="w60"><img class="avatar" :src="student.formattedImage" :alt="student.name" :title="student.name"></td>
                                                <td>
                                                    <p class="mb-0 d-flex justify-content-between">
                                                        <a :href="'/profiles/' + student.username"><span v-text="student.name"></span></a>
                                                        <span class="btn btn-outline-dark" @click.prevent="select(student, 'student')" v-if="! hasSelected(student, 'student')">
                                                            <i class="fa fa-plus"></i>
                                                        </span>
                                                    </p>
                                                    <span class="text-muted font-13" v-text="student.formattedUsername"></span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="card-body" v-else>
                                            No students in this batch
                                        </div>
                                    </div>
                                </div>
                                <div :class="selectedItems.length ? 'col-md-4' : 'col-md-6'">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">@{{ selectedBatch.name }} Groups</h3>
                                            <div class="card-options">
                                                <button class="btn btn-default btn-sm mr-2" @click="selectAll(groups, 'group')">
                                                    Select all
                                                </button>
                                                <button class="btn btn-danger btn-sm" @click="removeAll(groups)">
                                                    Unselect all
                                                </button>
                                            </div>
                                        </div>
                                        </div>
                                        <table class="table card-body mt-2" v-if="groups.length">
                                            <tbody>
                                            <tr v-for="group in groups" :key="group.id" :class="hasSelected(group, 'group') ? 'selected-item' : ''">
                                                <td>
                                                    <p class="mb-0 d-flex justify-content-between">
                                                        <a :href="'/groups/' + groups.id"><span v-text="group.name"></span></a>
                                                    </p>
                                                </td>
                                                <td>
                                                    <span class="text-muted">@{{ group.members_count }} Members</span>
                                                </td>
                                                <td>
                                                    <span class="btn btn-outline-dark" @click.prevent="select(group, 'group')" v-if="! hasSelected(group, 'group')">
                                                        <i class="fa fa-plus"></i>
                                                    </span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="card-body" v-else>
                                            No groups found in this batch
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" v-if="selectedItems.length">
                                    <div class="card">
                                        <div class="card-header">
                                            Task will be assigned to
                                        </div>
                                        <div class="card-body">
                                            <span
                                                v-for="(item, index) in selectedItems"
                                                :key="index"
                                                class="text-muted-dark d-block">
                                                @{{item.name}}
                                                <span class="badge badge-danger float-right" @click.prevent="removeFromSelected(item)">
                                                    <i class="fa fa-close"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </template>
                            <template v-else>
                                <div class="col-md-12 text-center">
                                    <div class="spinner-border" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </instructor-task-page>
    @else

    @endif
@endsection
