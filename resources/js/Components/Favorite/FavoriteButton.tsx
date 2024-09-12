import { Link } from "@inertiajs/react";
import { Star } from "lucide-react";
import { useTranslationsStore } from "@narsil-localization/Stores/translationStore";
import * as React from "react";
import * as TogglePrimitive from "@radix-ui/react-toggle";
import Button from "@narsil-ui/Components/Button/Button";
import TooltipWrapper from "@narsil-ui/Components/Tooltip/TooltipWrapper";
import type { ButtonProps } from "@narsil-ui/Components/Button/Button";

export interface FavoriteButtonProps extends Partial<ButtonProps> {
	isFavorite?: boolean;
}

const FavoriteButton = React.forwardRef<React.ElementRef<typeof TogglePrimitive.Root>, FavoriteButtonProps>(
	({ children, isFavorite = false, ...props }, ref) => {
		const { trans } = useTranslationsStore();

		const buttonLabel = trans(isFavorite ? "Remove from favorites" : "Add to favorites");

		return (
			<TooltipWrapper tooltip={buttonLabel}>
				<Button
					ref={ref}
					aria-label={buttonLabel}
					size={"icon"}
					variant={"ghost"}
					{...props}
				>
					<Link
						href={route(isFavorite ? "favorites.remove" : "favorites.add")}
						method='post'
					>
						<Star className='h-5 w-5' />
					</Link>
				</Button>
			</TooltipWrapper>
		);
	}
);

export default FavoriteButton;
