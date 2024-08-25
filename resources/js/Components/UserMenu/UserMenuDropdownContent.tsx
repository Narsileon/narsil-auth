import { Link } from "@inertiajs/react";
import { LogIn, LogOut, UserPlus } from "lucide-react";
import { useTranslationsStore } from "@narsil-localization/Stores/translationStore";
import * as React from "react";
import DropdownMenuContent, { DropdownMenuContentProps } from "@narsil-ui/Components/DropdownMenu/DropdownMenuContent";
import DropdownMenuGroup from "@narsil-ui/Components/DropdownMenu/DropdownMenuGroup";
import DropdownMenuItem from "@narsil-ui/Components/DropdownMenu/DropdownMenuItem";
import DropdownMenuSeparator from "@narsil-ui/Components/DropdownMenu/DropdownMenuSeparator";

interface UserMenuDropdownContentProps extends DropdownMenuContentProps {
	authenticated?: boolean;
	registerable?: boolean;
}

const UserMenuDropdownContent = React.forwardRef<HTMLDivElement, UserMenuDropdownContentProps>(
	({ authenticated = false, children, registerable = false }, ref) => {
		const { trans } = useTranslationsStore();

		return (
			<DropdownMenuContent
				ref={ref}
				collisionPadding={8}
			>
				{children}

				{authenticated ? (
					<>
						{children ? <DropdownMenuSeparator /> : null}

						<DropdownMenuGroup>
							<DropdownMenuItem asChild={true}>
								<Link
									as='button'
									href={route("logout")}
									method='post'
								>
									<LogOut className='h-5 w-5' />
									{trans("Sign out")}
								</Link>
							</DropdownMenuItem>
						</DropdownMenuGroup>
					</>
				) : (
					<>
						{children ? <DropdownMenuSeparator /> : null}

						<DropdownMenuGroup>
							<DropdownMenuItem asChild={true}>
								<Link href={route("login")}>
									<LogIn className='h-5 w-5' />
									{trans("Sign in")}
								</Link>
							</DropdownMenuItem>

							{registerable ? (
								<DropdownMenuItem asChild={true}>
									<Link href={route("register")}>
										<UserPlus className='h-5 w-5' />
										{trans("Register")}
									</Link>
								</DropdownMenuItem>
							) : null}
						</DropdownMenuGroup>
					</>
				)}
			</DropdownMenuContent>
		);
	}
);

export default UserMenuDropdownContent;
