<?php

namespace App\Http\Controllers;

use app\Lib\User\UserListingRequest;
use App\Lib\User\UserListingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class UserListingController extends Controller
{
    /**
     * @var UserListingService
     */
    private UserListingService $userListingService;

    /**
     * @param UserListingService $userListingService
     */
    public function __construct(UserListingService $userListingService)
    {
        $this->userListingService = $userListingService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->userListingService->getAllUsers();

        return view('users.index', ['users' => $users]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * @param UserListingRequest $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(UserListingRequest $request): RedirectResponse
    {
        $this->userListingService->addUser($request->only('personal'));

        return redirect()->route('users.index');
    }

    /**
     * @param int $userId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $userId): RedirectResponse
    {
        $this->userListingService->deleteUser($userId);

        return redirect()->route('users.index');
    }
}
