import { cn } from "@narsil-ui/Components";
import { Link } from "@inertiajs/react";
import { LogIn, LogOut, UserPlus } from "lucide-react";
import { navigationMenuTriggerStyle } from "@narsil-ui/Components/NavigationMenu/NavigationMenuTrigger";
import { useTranslationsStore } from "@narsil-localization/Stores/translationStore";
import * as React from "react";
import NavigationMenu from "@narsil-ui/Components/NavigationMenu/NavigationMenu";
import NavigationMenuItem from "@narsil-ui/Components/NavigationMenu/NavigationMenuItem";
import NavigationMenuLink from "@narsil-ui/Components/NavigationMenu/NavigationMenuLink";
import NavigationMenuList from "@narsil-ui/Components/NavigationMenu/NavigationMenuList";
import Separator from "@narsil-ui/Components/Separator/Separator";
import SheetClose from "@narsil-ui/Components/Sheet/SheetClose";
import SheetContent, { SheetContentProps } from "@narsil-ui/Components/Sheet/SheetContent";

interface UserMenuSheetContentProps extends Partial<SheetContentProps> {
	authenticated?: boolean;
	registerable?: boolean;
}

const UserMenuSheetContent = React.forwardRef<HTMLDivElement, UserMenuSheetContentProps>(
	({ authenticated = false, children, className, registerable = false, ...props }, ref) => {
		const { trans } = useTranslationsStore();

		return (
			<SheetContent
				ref={ref}
				className={cn("absolute inset-0 w-full", className)}
				side='left'
				{...props}
			>
				<NavigationMenu orientation='vertical'>
					<NavigationMenuList>
						{children}

						{authenticated ? (
							<>
								{children ? <Separator /> : null}

								<SheetClose asChild={true}>
									<NavigationMenuItem
										className={navigationMenuTriggerStyle()}
										asChild={true}
									>
										<Link
											as='button'
											href={route("logout")}
											method='post'
										>
											<LogOut className='h-5 w-5' />
											{trans("Sign out")}
										</Link>
									</NavigationMenuItem>
								</SheetClose>
							</>
						) : (
							<>
								{children ? <Separator /> : null}

								<SheetClose asChild={true}>
									<NavigationMenuItem
										className={navigationMenuTriggerStyle()}
										asChild={true}
									>
										<NavigationMenuLink
											active={route().current() === "login"}
											asChild={true}
										>
											<Link href={route("login")}>
												<LogIn className='h-5 w-5' />
												{trans("Sign in")}
											</Link>
										</NavigationMenuLink>
									</NavigationMenuItem>
								</SheetClose>

								{registerable ? (
									<SheetClose asChild={true}>
										<NavigationMenuItem
											className={navigationMenuTriggerStyle()}
											asChild={true}
										>
											<NavigationMenuLink
												active={route().current() === "register"}
												asChild={true}
											>
												<Link href={route("register")}>
													<UserPlus className='h-5 w-5' />
													{trans("Register")}
												</Link>
											</NavigationMenuLink>
										</NavigationMenuItem>
									</SheetClose>
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
