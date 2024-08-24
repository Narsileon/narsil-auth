import { Link } from "@inertiajs/react";
import { LogIn, LogOut, Menu, UserPlus } from "lucide-react";
import { useTranslationsStore } from "@narsil-localization/Stores/translationStore";
import * as React from "react";
import Avatar from "@narsil-ui/Components/Avatar/Avatar";
import AvatarFallback from "@narsil-ui/Components/Avatar/AvatarFallback";
import AvatarImage from "@narsil-ui/Components/Avatar/AvatarImage";
import Button from "@narsil-ui/Components/Button/Button";
import DropdownMenu from "@narsil-ui/Components/DropdownMenu/DropdownMenu";
import DropdownMenuContent from "@narsil-ui/Components/DropdownMenu/DropdownMenuContent";
import DropdownMenuGroup from "@narsil-ui/Components/DropdownMenu/DropdownMenuGroup";
import DropdownMenuItem from "@narsil-ui/Components/DropdownMenu/DropdownMenuItem";
import DropdownMenuSeparator from "@narsil-ui/Components/DropdownMenu/DropdownMenuSeparator";
import DropdownMenuTrigger, { DropdownMenuTriggerProps } from "@narsil-ui/Components/DropdownMenu/DropdownMenuTrigger";
import TooltipWrapper from "@narsil-ui/Components/Tooltip/TooltipWrapper";

interface LayoutUserMenuProps extends DropdownMenuTriggerProps {
	authenticated?: boolean;
	avatar?: string;
	avatarFallback?: string;
	registerable?: boolean;
}

const LayoutUserMenu = React.forwardRef<HTMLButtonElement, LayoutUserMenuProps>(
	({ authenticated = false, avatar, avatarFallback, children, registerable = false }, ref) => {
		const { trans } = useTranslationsStore();

		return (
			<DropdownMenu>
				<TooltipWrapper tooltip={trans("tooltips.menu")}>
					<DropdownMenuTrigger
						ref={ref}
						asChild={true}
					>
						{avatar || avatarFallback ? (
							<Avatar>
								<AvatarImage src={avatar} />
								<AvatarFallback>{avatarFallback}</AvatarFallback>
							</Avatar>
						) : (
							<Button
								size='icon'
								variant='ghost'
							>
								<Menu className='h-6 w-6' />
							</Button>
						)}
					</DropdownMenuTrigger>
				</TooltipWrapper>
				<DropdownMenuContent collisionPadding={8}>
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
			</DropdownMenu>
		);
	}
);

export default LayoutUserMenu;
