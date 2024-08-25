import { Link } from "@inertiajs/react";
import { LogIn, LogOut, UserPlus } from "lucide-react";
import { useTranslationsStore } from "@narsil-localization/Stores/translationStore";
import * as React from "react";
import DropdownMenuItem from "@narsil-ui/Components/DropdownMenu/DropdownMenuItem";
import NavigationMenu from "@narsil-ui/Components/NavigationMenu/NavigationMenu";
import NavigationMenuItem from "@narsil-ui/Components/NavigationMenu/NavigationMenuItem";
import NavigationMenuList from "@narsil-ui/Components/NavigationMenu/NavigationMenuList";
import Separator from "@narsil-ui/Components/Separator/Separator";
import SheetContent, { SheetContentProps } from "@narsil-ui/Components/Sheet/SheetContent";

interface UserMenuSheetContentProps extends Partial<SheetContentProps> {
	authenticated?: boolean;
	registerable?: boolean;
}

const UserMenuSheetContent = React.forwardRef<HTMLDivElement, UserMenuSheetContentProps>(
	({ authenticated = false, children, registerable = false, ...props }, ref) => {
		const { trans } = useTranslationsStore();

		return (
			<SheetContent
				ref={ref}
				{...props}
			>
				<NavigationMenu>
					<NavigationMenuList>
						{children}

						{authenticated ? (
							<>
								{children ? <Separator /> : null}

								<NavigationMenuItem asChild={true}>
									<Link
										as='button'
										href={route("logout")}
										method='post'
									>
										<LogOut className='h-5 w-5' />
										{trans("Sign out")}
									</Link>
								</NavigationMenuItem>
							</>
						) : (
							<>
								{children ? <Separator /> : null}

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
							</>
						)}
					</NavigationMenuList>
				</NavigationMenu>
			</SheetContent>
		);
	}
);

export default UserMenuSheetContent;
