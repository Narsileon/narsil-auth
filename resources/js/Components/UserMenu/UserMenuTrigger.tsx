import { useTranslationsStore } from "@narsil-localization/Stores/translationStore";
import * as React from "react";
import DropdownMenuTrigger, { DropdownMenuTriggerProps } from "@narsil-ui/Components/DropdownMenu/DropdownMenuTrigger";
import SheetTrigger, { SheetTriggerProps } from "@narsil-ui/Components/Sheet/SheetTrigger";
import TooltipWrapper from "@narsil-ui/Components/Tooltip/TooltipWrapper";
import useScreenStore from "@narsil-ui/Stores/screenStore";

interface UserMenuSheetTriggerProps extends DropdownMenuTriggerProps, SheetTriggerProps {
	authenticated?: boolean;
	avatar?: string;
	avatarFallback?: string;
	registerable?: boolean;
}

const UserMenuTrigger = React.forwardRef<HTMLButtonElement, UserMenuSheetTriggerProps>(({ ...props }, ref) => {
	const { isMobile } = useScreenStore();
	const { trans } = useTranslationsStore();

	return (
		<TooltipWrapper tooltip={trans("Menu")}>
			{isMobile ? (
				<SheetTrigger
					ref={ref}
					{...props}
				/>
			) : (
				<DropdownMenuTrigger
					ref={ref}
					{...props}
				/>
			)}
		</TooltipWrapper>
	);
});

export default UserMenuTrigger;
